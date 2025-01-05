<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles', [ArticleController::class, 'showArticles']);

Route::get('/articles/lemonde', [ArticleController::class, 'fetchLeMondeArticles']);
