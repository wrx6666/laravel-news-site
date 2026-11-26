<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::query()
            ->latest('published_at')
            ->orderByDesc('id')
            ->paginate(6);

        return view('articles.index', ['articles' => $articles]);
    }

    public function create(): View
    {
        return view('articles.create', ['article' => new Article(['published_at' => now()])]);
    }

    public function store(ArticleRequest $request): RedirectResponse
    {
        $article = Article::create($request->validated());

        return to_route('articles.show', $article)->with('status', 'Статья создана.');
    }

    public function show(Article $article): View
    {
        return view('articles.show', ['article' => $article]);
    }

    public function edit(Article $article): View
    {
        return view('articles.edit', ['article' => $article]);
    }

    public function update(ArticleRequest $request, Article $article): RedirectResponse
    {
        $article->update($request->validated());

        return to_route('articles.show', $article)->with('status', 'Изменения сохранены.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return to_route('articles.index')->with('status', 'Статья удалена.');
    }
}
