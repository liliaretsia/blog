<?php

namespace App\Http\Controllers;

use App\Entity\Article;
use App\Entity\Image;

class HomeController extends Controller
{
    public function index()
    {
        $images = Image::all();

        $articles = Article::all();

        return view('home', compact('images', 'articles'));
    }
}
