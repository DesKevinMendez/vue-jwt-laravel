<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComentarioBlog extends Model
{
    protected $guarded = ['id'];

    // Relaciones para usuarios
    public function usuario(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
