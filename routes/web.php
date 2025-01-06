<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

#Route::get('/', function () {
    #return view('welcome');
#});


Route::get('/', function () {
    return view('page');
});


Route::get('/articles', [ArticleController::class, 'showArticles']);

Route::get('/articles/lemonde', [ArticleController::class, 'fetchAllLeMondeArticles']);

Route::get('/articles/lequipe', [ArticleController::class, 'fetchAllLEquipeArticles']);

Route::get('/articles/all', [ArticleController::class, 'listArticles']);