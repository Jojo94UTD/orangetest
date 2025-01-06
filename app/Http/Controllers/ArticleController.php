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

public function listArticles()
{
    // 1. Récupérer les articles de la base de données et les convertir en collection
    $dbArticles = collect(Article::all()); // Assurez-vous que c'est une collection Laravel

    // 2. Récupérer les articles de l'API Le Monde
    $leMondeResponse = Http::get('https://api-catch-the-dev.unit41.fr/lemonde', [
        'date' => now()->format('Y-m-d'), // Ajoutez d'autres paramètres si nécessaires
    ]);

    $leMondeArticles = $leMondeResponse->successful()
        ? collect($leMondeResponse->json('data')) // Convertir en collection Laravel
        : collect([]); // Si l'API échoue, retourner une collection vide

    // 3. Récupérer les articles de l'API L'Équipe
    $lequipeResponse = Http::get('https://api-catch-the-dev.unit41.fr/lequipe', [
        'token' => 'lequipe', // Ajoutez le token requis
        'date' => now()->format('Y-m-d'), // Ajoutez d'autres paramètres si nécessaires
    ]);

    $lequipeArticles = $lequipeResponse->successful()
        ? collect($lequipeResponse->json('data')) // Convertir en collection Laravel
        : collect([]); // Si l'API échoue, retourner une collection vide

    // 4. Fusionner les articles de la base de données et ceux des APIs
    $allArticles = $dbArticles->merge($leMondeArticles)->merge($lequipeArticles);

    // 5. Trier les articles par date de publication
    $sortedArticles = $allArticles->sortByDesc(function ($article) {
        return $article['published_at'] ?? null; // Trier par 'published_at'
    });

    // 6. Retourner la vue avec les articles triés
    return view('articles.list', ['articles' => $sortedArticles]);
}






}


