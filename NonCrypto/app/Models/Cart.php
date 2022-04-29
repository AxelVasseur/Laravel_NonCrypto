<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'article_id',
    ];

    public $timestamps = false;

    public function article()
    {
        return $this->hasOne(Article::class, "id","article_id");

    }
}
