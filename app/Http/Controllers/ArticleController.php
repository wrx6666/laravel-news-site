<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::query()
            ->latest('published_at')
            ->orderByDesc('id')
            ->get();

        return view('articles.index', ['articles' => $articles]);
    }
}
