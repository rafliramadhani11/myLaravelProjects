<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::get();
        // return new ArticleCollection($articles); // WITH COLLECTION
        return ArticleResource::collection($articles); // WITH RESOURCE
    }


    public function store(ArticleRequest $request)
    {
        $article = auth()->user()->articles()->create($this->articleStore());

        return $article;
    }


    public function show(Article $article)
    {
        // return response([
        //     'data' => [
        //         'status' => 'Success',
        //         'article' => new ArticleResource($article)
        //     ]
        // ]);

        return new ArticleResource($article);
    }


    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($this->articleStore());
        return new ArticleResource($article);
    }


    public function destroy(Article $article)
    {
        $article->delete();

        return response("The Article was Deleted", 200);
    }

    public function articleStore()
    {
        return [
            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'body' => request('body'),
            'subject_id' => request('subject')
        ];
    }
}
