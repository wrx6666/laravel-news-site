@extends('layouts.app')

@section('title', 'Редактирование статьи')

@section('content')
    <section class="article-editor" aria-labelledby="page-heading">
        <a class="back-link" href="{{ route('articles.show', $article) }}">К статье</a>
        <h1 id="page-heading">Редактирование статьи</h1>

        <form class="article-form" method="post" action="{{ route('articles.update', $article) }}">
            @method('PUT')
            @include('articles.fields')
            <button class="form-submit" type="submit">Сохранить изменения</button>
        </form>
    </section>
@endsection
