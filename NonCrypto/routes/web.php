<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\Comments;
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
    return view('welcome');
});

Route::get('/home', function () {
    $article = Article::select("*")->paginate(5);
    return view('home', compact('article'));
    })->name('home');

Route::get('/crypto',  [ArticleController::class, 'index'])->name('crypto');



