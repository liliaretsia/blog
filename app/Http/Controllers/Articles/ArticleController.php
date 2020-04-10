<?php

namespace App\Http\Controllers\Articles;

use App\Entity\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function show($article_url)
    {
        $article = Article::where('slug', '=', $article_url)->firstOrFail();
        return view('articles.show', compact('article'));
    }
}
