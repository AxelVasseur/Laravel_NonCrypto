<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/', function () {
    $article = Article::select("*")->paginate(5);
    return view('home', compact('article'));
    })->name('home');

Route::get('/crypto/{id}',  [ArticleController::class, 'show_article'])->name('crypto');

Route::get('/utilisateur', function () {
    $users = User::paginate(5);
    return view('utilisateur', compact('users'));
    })->name('utilisateur');

Route::get('/utilisateur/{user}', [UserController::class, 'show'])
->middleware(['auth'])
->name('show');



Route::get('/tag/{id}', [TagController::class, 'show_tag'])->name('tag');

Route::post('/post-comment/{id}', [CommentController::class, 'create'])->name('post-comment');

require __DIR__.'/auth.php';