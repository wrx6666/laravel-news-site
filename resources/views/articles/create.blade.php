@extends('layouts.app')

@section('title', 'Новая статья')

@section('content')
    <section class="article-editor" aria-labelledby="page-heading">
        <a class="back-link" href="{{ route('articles.index') }}">К списку статей</a>
        <h1 id="page-heading">Новая статья</h1>

        <form class="article-form" method="post" action="{{ route('articles.store') }}">
            @include('articles.fields')
            <button class="form-submit" type="submit">Создать статью</button>
        </form>
    </section>
@endsection
