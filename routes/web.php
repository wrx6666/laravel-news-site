<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/galery/{article}', [MainController::class, 'galery'])->whereNumber('article')->name('galery');
Route::view('/about', 'about')->name('about');
Route::get('/signin', [AuthController::class, 'create'])->name('signin');
Route::post('/signin', [AuthController::class, 'registration'])->name('signin.registration');

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
