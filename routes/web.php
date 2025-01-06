<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page');
});


#Route::get('/articles', [ArticleController::class, 'showArticles']);

Route::get('/articles/lemonde', [ArticleController::class, 'fetchAllLeMondeArticles']);

Route::get('/articles/lequipe', [ArticleController::class, 'fetchAllLEquipeArticles']);

Route::get('/articles', [ArticleController::class, 'listArticles']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


