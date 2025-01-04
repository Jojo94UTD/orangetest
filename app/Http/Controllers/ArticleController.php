<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Models\Article;

class ArticleController extends Controller
{
    // Retourne une vue affichant tous les articles
    public function showArticles()
    {
        $articles = Article::all(); // Récupère tous les articles
        return view('articles.index', compact('articles')); // Retourne la vue avec les articles
    }
}