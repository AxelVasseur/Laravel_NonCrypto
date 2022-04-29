<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    })->middleware(['auth'])->name('home');
    


Route::get('/crypto/{id}',  [ArticleController::class, 'show_article']
)->middleware(['auth'])->name('crypto');


Route::get('/tag/{id}', [TagController::class, 'show_tag'])->middleware(['auth'])->name('tag');

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/private', function () {

        return 'Admin page';
    });
});

Route::post ('/grantUser', function (){
    $user = \App\Models\Grant::create(['user_id'=>Auth::id(), 'role_id'=>1]);
    $article = Article::select("*")->paginate(5);
    return view('home', compact('article'));
    })->middleware(['auth'])->name('grantUser');



require __DIR__.'/auth.php';

