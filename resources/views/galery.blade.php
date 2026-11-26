@extends('layouts.app')

@section('title', 'Галерея')

@section('content')
    <article class="gallery" aria-labelledby="page-heading">
        <a class="back-link" href="{{ route('home') }}">К новостям</a>
        <p class="article-date">{{ $article['date'] }}</p>
        <h1 id="page-heading">{{ $article['name'] }}</h1>
        <img class="gallery-image" src="{{ asset($article['full_image']) }}"
            alt="Фотография к новости «{{ $article['name'] }}»">
        <p>{{ $article['desc'] }}</p>
    </article>
@endsection
