<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Article;
use App\Entity\Photo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $article = (new Article)->newQuery();

        if (!empty($filter = $request->get('header'))) {
            $article->where('header', 'LIKE', '%' . $filter . '%');
        }

        if (!empty($filterDate = $request->get('created'))) {
            $filterDate = strrpos($filterDate, "/") ? explode('/', $filterDate) : '';
            if ($filterDate !== '' ) {
                $formattedDate = $filterDate[2] . '-' . $filterDate[0] . '-' . $filterDate[1];
                $article->whereDate('created_at', '=', date($formattedDate));
            }
        }

        $articles = $article->get();

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $photo_ids = Article::photosList();
        return view('admin.articles.create',  compact('photo_ids'));
    }

    public function store(ArticleRequest $request)
    {
        $article = Article::create([
            'header' => $request['header'],
            'slug' => $request['slug'],
            'photo_id' => $request['photo_id'],
            'content' => $request['content'],
        ]);

        return redirect()->route('admin.articles.show', $article);
    }

    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $photo_ids = Article::photosList();
        return view('admin.articles.edit', compact('article', 'photo_ids'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->update([
            'header' => $request['header'],
            'slug' => $request['slug'],
            'photo_id' => $request['photo_id'],
            'content' => $request['content'],
        ]);

        return redirect()->route('admin.articles.show', $article);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('admin.articles.index');
    }
}
