@extends('layouts.app')

@section('title'){{ $article->title }}@endsection

@section('content')
    <article class="article-content" aria-labelledby="page-heading">
        <a class="back-link" href="{{ route('articles.index') }}">К списку статей</a>

        @if (session('status'))
            <p class="status-message" role="status">{{ session('status') }}</p>
        @endif

        <p class="article-date">
            <time datetime="{{ $article->published_at->toAtomString() }}">
                {{ $article->published_at->format('d.m.Y H:i') }}
            </time>
        </p>
        <h1 id="page-heading">{{ $article->title }}</h1>
        <p class="article-text">{{ $article->body }}</p>

        <div class="article-actions">
            <a href="{{ route('articles.edit', $article) }}">Редактировать</a>

            <form method="post" action="{{ route('articles.destroy', $article) }}"
                onsubmit="return confirm('Удалить эту статью?')">
                @csrf
                @method('DELETE')
                <button class="delete-action" type="submit">Удалить статью</button>
            </form>
        </div>
    </article>
@endsection
