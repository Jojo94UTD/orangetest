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

    public function fetchLeMondeArticles()
{
    $response = Http::get('https://api-catch-the-dev.unit41.fr/lemonde', [
        'date' => now()->format('Y-m-d'),
    ]);

    if ($response->successful()) {
        $articles = $response->json('data'); // Récupérer les articles
        return view('articles.lemonde', compact('articles'));
    } else {
        abort(500, 'Failed to fetch articles');
    }
}


}


