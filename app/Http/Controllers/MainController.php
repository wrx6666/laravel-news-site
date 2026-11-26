<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;

class MainController extends Controller
{
    public function index(): View
    {
        return view('home', ['articles' => $this->articles()]);
    }

    public function galery(string $article): View
    {
        $articles = $this->articles();
        abort_unless(isset($articles[$article]), 404);

        return view('galery', ['article' => $articles[$article]]);
    }

    private function articles(): array
    {
        return File::json(public_path('articles.json'), JSON_THROW_ON_ERROR);
    }
}
