@extends('layouts.app')

@section('title', 'Статьи')

@section('content')
    <section aria-labelledby="page-heading">
        <div class="article-toolbar">
            <h1 id="page-heading">Статьи</h1>
            <a class="form-submit" href="{{ route('articles.create') }}">Новая статья</a>
        </div>

        @if (session('status'))
            <p class="status-message" role="status">{{ session('status') }}</p>
        @endif

        <div class="news-grid">
            @forelse ($articles as $article)
                <article class="news-card">
                    <div class="news-body">
                        <p class="article-date">
                            <time datetime="{{ $article->published_at->toAtomString() }}">
                                {{ $article->published_at->format('d.m.Y') }}
                            </time>
                        </p>
                        <h2><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h2>
                        <p>{{ \Illuminate\Support\Str::limit($article->body, 180) }}</p>
                    </div>
                </article>
            @empty
                <p>Статей пока нет.</p>
            @endforelse
        </div>

        {{ $articles->links('articles.pagination') }}
    </section>
@endsection
