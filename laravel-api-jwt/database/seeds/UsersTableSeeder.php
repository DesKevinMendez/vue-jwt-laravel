<?php

use Illuminate\Database\Seeder;
use App\Models\{User, Blog};

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Blogs
        factory(User::class, 10)->create()->each(function ($user){
            // Agregamos un nuevo blog para cada usuario
            $blog = $user->blogs()->save(factory(Blog::class)->make());
            // Por cada blog creamos un nuevo comentario
            $blog->comentarios()->create([
                'comentario' => $blog->cuerpo,
                'user_id' => rand(1,10),
                'blog_id' => $blog->id
            ]);
        });

    }
}
