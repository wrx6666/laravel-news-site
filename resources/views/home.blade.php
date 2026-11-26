@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <section aria-labelledby="page-heading">
        <h1 id="page-heading">Новости</h1>
        <p>Добро пожаловать в «{{ config('app.name') }}»!</p>

        <div class="news-grid">
            @forelse ($articles as $index => $article)
                <article class="news-card">
                    <a class="news-preview" href="{{ route('galery', ['article' => $index]) }}"
                        aria-label="Открыть фотографию к новости «{{ $article['name'] }}»">
                        <img src="{{ asset($article['preview_image']) }}" alt="" loading="lazy">
                    </a>
                    <div class="news-body">
                        <p class="article-date">{{ $article['date'] }}</p>
                        <h2>{{ $article['name'] }}</h2>
                        <p>{{ $article['shortDesc'] ?? \Illuminate\Support\Str::limit($article['desc'], 160) }}</p>
                    </div>
                </article>
            @empty
                <p>Пока нет новостей.</p>
            @endforelse
        </div>
    </section>
@endsection
