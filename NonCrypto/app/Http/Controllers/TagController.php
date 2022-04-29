<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
            public function show_tag($id)
        {
            $tag = Tag::where("id", $id)->first();
            return view('tag_articles', compact('tag'));
        }
    
}
