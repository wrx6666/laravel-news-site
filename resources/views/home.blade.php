@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <section class="welcome" aria-labelledby="page-heading">
        <h1 id="page-heading">Добро пожаловать в «{{ config('app.name') }}»!</h1>
        <p>Здесь будут выходить новости о городе, людях и событиях, которые меняют нашу повседневную жизнь.</p>
        <a class="button" href="{{ route('about') }}">О проекте</a>
    </section>
@endsection
