<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create(): View
    {
        return view('auth.signin');
    }

    public function registration(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ], [
            'required' => 'Заполните поле «:attribute».',
            'string' => 'Введите текст в поле «:attribute».',
            'email' => 'Введите корректный email.',
            'min' => 'Пароль должен содержать не менее :min символов.',
            'max' => 'В поле «:attribute» должно быть не более :max символов.',
        ], [
            'name' => 'Имя',
            'email' => 'Email',
            'password' => 'Пароль',
        ]);

        return response()->json([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ], 200, [
            'Content-Disposition' => 'inline; filename="registration.json"',
            'Cache-Control' => 'no-store',
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
