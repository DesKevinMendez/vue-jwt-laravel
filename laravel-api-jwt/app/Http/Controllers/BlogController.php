<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Blog, User};
use JWTAuth;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Blog::with('comentarios', 'usuario')->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'cuerpo' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $blog = new Blog;
        $blog->titulo = $request->titulo;
        $blog->cuerpo = $request->cuerpo;
        $blog->user_id = Auth()->user()->id;
        $blog->save();

        return $blog;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $blogURL
     * @return \Illuminate\Http\Response
     */
    public function show($blogURL)
    {
        return Blog::with('comentarios', 'usuario')->where('url', $blogURL)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $blogURL)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'cuerpo' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $blog = Blog::where('url', $blogURL)->first();
        $blog->titulo = $request->titulo;
        $blog->cuerpo = $request->cuerpo;
        $blog->user_id = auth()->user()->id;
        $blog->update();

        return $blog;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy($url)
    {
        $blog = Blog::where('url', $url)->first();
        // elimina primero los comentarios asociados a este blog
        $blog->comentarios()->delete();
        // elimina el blog
        $blog->delete();

        return "Se eliminó el blog";
    }
}
