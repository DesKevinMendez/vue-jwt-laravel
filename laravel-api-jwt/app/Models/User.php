<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasRoles;
    // Guard name para laravel permisions
    protected $guard_name = 'api';

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Mutadores
    public function setPasswordAttribute($attribute)
    {
        $this->attributes['password'] = bcrypt($attribute);
        $url = str_replace(' ', '-', $this->attributes['name']);
        if (static::where('url', $url)->exists()) {
            //Obtiene el ultimo post que coincida con la url y le sumauno, para tner la nueva URL
            $tempo = static::latest()->where('url', $url)->first();
            $url = "{$url}-".++$tempo->id;
        }
        $this->attributes['url'] = strtolower($url);

    }

     // Relaciones para blogs
     public function blogs(){
        return $this->hasMany(Blog::Class);
    }


}
