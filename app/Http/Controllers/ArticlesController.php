<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Resources\ArticleResource;
class ArticlesController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        return response()->json([
            'article' => ArticleResource::collection(Article::orderBy('stock', 'desc')->take(10)->get())
        ], 200);
    }
}
