<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CartController;
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
    })->middleware(['auth'])->name('home');
    


Route::get('/crypto/{id}',  [ArticleController::class, 'show_article']
)->middleware(['auth'])->name('crypto');


Route::get('/tag/{id}', [TagController::class, 'show_tag'])->middleware(['auth'])->name('tag');


Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/private', function () {
      return 'Admin page';
    });
});
      
Route::get('/utilisateur', function () {
    $users = User::paginate(5);
    return view('utilisateur', compact('users'));
    })->name('utilisateur');

Route::get('/utilisateur/{user}', [UserController::class, 'show'])
->middleware(['auth'])
->name('show');
        

Route::post ('/grantUser', function (){
    $user = \App\Models\Grant::create(['user_id'=>Auth::id(), 'role_id'=>1]);
    $article = Article::select("*")->paginate(5);
    return view('home', compact('article'));
    })->middleware(['auth'])->name('grantUser');

Route::post('/post-comment/{id}', [CommentController::class, 'create'])->name('post-comment');


Route::post('/modify-comment/{id}', [CommentController::class, 'modify'])->name('modify-comment');

Route::patch('/update-comment/{comment_id}/{article_id}', [CommentController::class, 'update'])->name('update-comment');

Route::delete('/delete-comment/{comment_id}/{article_id}', [CommentController::class, 'delete'])->name('delete-comment');

Route::get('/cart', [CartController::class, 'show_cart'])->name('cart');

Route::post('/add-to-cart/{id}', [CartController::class, 'create'])->name('add-to-cart');

Route::delete('/remove-cart-article/{id}', [CartController::class, 'delete'])->name('remove-cart-article');


require __DIR__.'/auth.php';

