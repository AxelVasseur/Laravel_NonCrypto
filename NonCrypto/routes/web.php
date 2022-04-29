<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
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

Route::post('/post-comment/{id}', [CommentController::class, 'create'])->name('post-comment');

Route::post('/modify-comment/{id}', [CommentController::class, 'modify'])->name('modify-comment');

Route::patch('/update-comment/{comment_id}/{article_id}', [CommentController::class, 'update'])->name('update-comment');

Route::delete('/delete-comment/{comment_id}/{article_id}', [CommentController::class, 'delete'])->name('delete-comment');

require __DIR__.'/auth.php';