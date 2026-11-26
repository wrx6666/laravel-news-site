@extends('layouts.app')

@section('title', 'О нас')

@section('content')
    <article class="text-page" aria-labelledby="page-heading">
        <h1 id="page-heading">О нас</h1>
        <p>«{{ config('app.name') }}» — учебный новостной сайт о жизни города. Мы хотим рассказывать о культурных событиях, городских инициативах и людях, которые делают их возможными.</p>
        <p>Готовим первый выпуск. Если у вас есть идея для материала, загляните в раздел <a href="{{ route('contacts') }}">«Контакты»</a>.</p>
    </article>
@endsection
