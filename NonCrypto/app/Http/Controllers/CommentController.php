<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(Request $request, $id)
    {
        $comment = Comment::create([
            'body' => $request->comment,
            'user_id' => Auth::id(),
            'article_id' => $id,
        ]);

        return redirect()->route('crypto', $id);
    }
}
