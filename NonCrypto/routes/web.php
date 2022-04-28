<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Users;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {

    $article = Article::select("*")->paginate(5);
    return view('home', compact('article'));
    })->name('home');

Route::get('/crypto/{id}',  [ArticleController::class, 'show_article'])->name('crypto');


Route::get('/tag/{id}', [TagController::class, 'show_tag'])->name('tag');



require __DIR__.'/auth.php';

