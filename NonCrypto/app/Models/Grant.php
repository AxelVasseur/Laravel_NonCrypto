<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'role_id',
    ];
    public $timestamps = false;
    public function rolename(){
        return $this->HasOne(Role::class, 'id', 'role_id');
    }
}
