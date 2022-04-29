<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function tag()
    {
        return $this->hasOne(Tag::class, "id","tag_id");
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, "article_id", "id");
    }
}
