<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');

Route::get('/contacts', function () {
    $contacts = [
        [
            'label' => 'Электронная почта',
            'value' => 'redaktsiya@example.com',
            'url' => 'mailto:redaktsiya@example.com',
        ],
        [
            'label' => 'Часы работы',
            'value' => 'Понедельник — пятница, 10:00–18:00 (МСК)',
        ],
    ];

    return view('contacts', ['contacts' => $contacts]);
})->name('contacts');
