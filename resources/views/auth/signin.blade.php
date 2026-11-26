@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <section class="signin" aria-labelledby="page-heading">
        <h1 id="page-heading">Регистрация</h1>

        @php
            $oldName = old('name');
            $oldEmail = old('email');
        @endphp

        <form class="signin-form" method="post" action="{{ route('signin.registration') }}">
            @csrf

            <div class="form-field">
                <label for="name">Имя</label>
                <input id="name" name="name" type="text" autocomplete="name" maxlength="255"
                    value="{{ is_string($oldName) ? $oldName : '' }}" required
                    @error('name') aria-invalid="true" aria-describedby="name-error" @enderror>
                @error('name')
                    <p class="field-error" id="name-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" autocomplete="email" maxlength="255"
                    value="{{ is_string($oldEmail) ? $oldEmail : '' }}" required
                    @error('email') aria-invalid="true" aria-describedby="email-error" @enderror>
                @error('email')
                    <p class="field-error" id="email-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-field">
                <label for="password">Пароль</label>
                <input id="password" name="password" type="password" autocomplete="new-password"
                    minlength="8" maxlength="255" required
                    @error('password') aria-invalid="true" aria-describedby="password-error" @else aria-describedby="password-hint" @enderror>
                @error('password')
                    <p class="field-error" id="password-error">{{ $message }}</p>
                @else
                    <p class="field-hint" id="password-hint">Не менее 8 символов.</p>
                @enderror
            </div>

            <button class="form-submit" type="submit">Зарегистрироваться</button>
        </form>
    </section>
@endsection
