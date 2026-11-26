<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'published_at' => ['required', 'date_format:Y-m-d\TH:i,Y-m-d\TH:i:s'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Введите заголовок.',
            'title.string' => 'Заголовок должен быть текстом.',
            'title.max' => 'Заголовок должен содержать не более :max символов.',
            'body.required' => 'Введите текст статьи.',
            'body.string' => 'Введите текст статьи.',
            'published_at.required' => 'Укажите дату и время публикации.',
            'published_at.date_format' => 'Укажите корректную дату и время публикации.',
        ];
    }
}
