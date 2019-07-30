<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = ['id'];

    // Relaciones

    public function comentarios(){
        return $this->hasMany(ComentarioBlog::class)->latest();
    }

    public function usuario(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    
    // Mutadores
   public function setTituloAttribute($attribute){
    $this->attributes['titulo'] = $attribute;

    $url = str_slug($attribute);
    //Verificando que la url sea unica
    if ($this->where('url', $url)->exists()) {
        //Obtiene el ultimo post que coincida con la url y le sumauno, para tner la nueva URL
        $tempo = $this->latest()->where('url', 'LIKE', "{$url}%")->first();
        $url = "{$url}-".++$tempo->id;
    }
    $this->attributes['url']     = $url;
}
}
