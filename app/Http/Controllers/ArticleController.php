<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;




use App\Models\Article;

class ArticleController extends Controller
{
    // Retourne une vue affichant tous les articles
    public function showArticles()
    {
        $articles = Article::all(); // Récupère tous les articles
        return view('articles.index', compact('articles')); // Retourne la vue avec les articles
    }

    public function fetchAllLeMondeArticles()
    {
        // URL de l'API
        $url = 'https://api-catch-the-dev.unit41.fr/lemonde';

        // Requête GET à l'API
        $response = Http::get($url, [
            'date' => now()->format('Y-m-d'), // Utilisation de la date actuelle
        ]);

        if ($response->successful()) {
            // Récupération des données de l'API
            $articles = $response->json('data'); // Accès à la clé 'data' de la réponse JSON

            // Retourner la vue avec les articles
            return view('articles.lemonde', compact('articles'));
        } else {
            // Gérer les erreurs
            return response()->json([
                'error' => 'Failed to fetch articles',
                'details' => $response->body(),
            ], $response->status());
        }
    }

    public function fetchAllLEquipeArticles()
{

    $response = Http::withBasicAuth('jojo', 'jojo') // Authentification Basic
    ->withHeaders([
        'Authorization' => 'Bearer lequipe', // Ajouter le token dans l'en-tête
    ])
    ->get('https://api-catch-the-dev.unit41.fr/lequipe', [
        'date' => now()->format('Y-m-d'), // Paramètre de date
        'token' => 'lequipe', // Token ajouté comme paramètre
    ]);

    dd($response->status(), $response->body());


if ($response->successful()) {
    $articles = $response->json('data'); // Récupération des données de l'API
    return view('articles.lequipe', compact('articles')); // Retourner la vue avec les articles
} else {
    return response()->json([
        'error' => 'Failed to fetch articles',
        'details' => $response->body(),
    ], $response->status());
}

    
}

public function listArticles(Request $request)
{
    // Récupérer les filtres de la requête
    $category = $request->query('category');
    $journal = $request->query('journal');
    $date = $request->query('date');

    // 1. Récupérer les articles de la base de données
    $dbArticles = Article::query();

    if ($category) {
        $dbArticles->where('category', $category);
    }
    if ($journal) {
        $dbArticles->where('journal', $journal);
    }
    if ($date) {
        $dbArticles->whereDate('published_at', $date);
    }

    $dbArticles = collect($dbArticles->get());

    // 2. Récupérer les articles de l'API Le Monde
    $leMondeResponse = Http::get('https://api-catch-the-dev.unit41.fr/lemonde', [
        'date' => $date ?: now()->format('Y-m-d'),
    ]);

    $leMondeArticles = $leMondeResponse->successful()
        ? collect($leMondeResponse->json('data'))->filter(function ($article) use ($category, $journal, $date) {
            return (!$category || (isset($article['category']) && $article['category'] == $category)) &&
                   (!$journal || $journal == 'LeMonde') && // Vérifie si le journal est "LeMonde"
                   (!$date || (isset($article['published_at']) && $article['published_at'] == $date));
        })
        : collect([]);

    // 3. Récupérer les articles de l'API L'Équipe
    $lequipeResponse = Http::get('https://api-catch-the-dev.unit41.fr/lequipe', [
        'token' => 'lequipe',
        'date' => $date ?: now()->format('Y-m-d'),
    ]);

    $lequipeArticles = $lequipeResponse->successful()
        ? collect($lequipeResponse->json('data'))->filter(function ($article) use ($category, $journal, $date) {
            return (!$category || (isset($article['category']) && $article['category'] == $category)) &&
                   (!$journal || $journal == 'LEquipe') && // Vérifie si le journal est "LEquipe"
                   (!$date || (isset($article['published_at']) && $article['published_at'] == $date));
        })
        : collect([]);

    // 4. Fusionner et trier les articles
    $allArticles = $dbArticles->merge($leMondeArticles)->merge($lequipeArticles);

    $sortedArticles = $allArticles->sortByDesc(function ($article) {
        return $article['published_at'] ?? null;
    });

    // 5. Retourner la vue avec les articles filtrés
    return view('articles.list', [
        'articles' => $sortedArticles,
        'filters' => compact('category', 'journal', 'date'),
    ]);
}


}


