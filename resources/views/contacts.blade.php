@extends('layouts.app')

@section('title', 'Контакты')

@section('content')
    <section class="text-page" aria-labelledby="page-heading">
        <h1 id="page-heading">Контакты</h1>
        <p>Контактные данные редакции приведены для примера.</p>

        <dl class="contact-list">
            @foreach ($contacts as $contact)
                <div>
                    <dt>{{ $contact['label'] }}</dt>
                    <dd>
                        @isset($contact['url'])
                            <a href="{{ $contact['url'] }}">{{ $contact['value'] }}</a>
                        @else
                            {{ $contact['value'] }}
                        @endisset
                    </dd>
                </div>
            @endforeach
        </dl>
    </section>
@endsection
