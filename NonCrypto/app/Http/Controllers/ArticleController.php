<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function show_article($id)
    {
        $user = Auth::user();
        $article = Article::where("id", $id)->first();
        return view('crypto', compact('article', 'user'));
    }

}
