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

    public function modify(Request $request, $id)
    {
        $comment = Comment::where('id', $id)->first();

        return view('comment_modify', compact('comment'));
    }

    public function update(Request $request, $id, $article_id)
    {
        Comment::where('id', $id)->update(['body' => $request->comment]);

        return redirect()->route('crypto', $article_id);
    }

    public function delete(Request $request, $id, $article_id)
    {
        Comment::where('id', $id)->delete();

        return redirect()->route('crypto', $article_id);
    }
}
