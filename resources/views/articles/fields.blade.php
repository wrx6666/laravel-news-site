@csrf

@php
    $title = old('title', $article->title);
    $body = old('body', $article->body);
    $publishedAt = old('published_at', $article->published_at->format('Y-m-d\TH:i:s'));
@endphp

<div class="form-field">
    <label for="title">Заголовок</label>
    <input id="title" name="title" type="text" maxlength="255"
        value="{{ is_string($title) ? $title : '' }}" required
        @error('title') aria-invalid="true" aria-describedby="title-error" @enderror>
    @error('title')
        <p class="field-error" id="title-error">{{ $message }}</p>
    @enderror
</div>

<div class="form-field">
    <label for="published_at">Дата и время публикации ({{ config('app.timezone') }})</label>
    <input id="published_at" name="published_at" type="datetime-local" step="1"
        value="{{ is_string($publishedAt) ? $publishedAt : '' }}" required
        @error('published_at') aria-invalid="true" aria-describedby="published-at-error" @enderror>
    @error('published_at')
        <p class="field-error" id="published-at-error">{{ $message }}</p>
    @enderror
</div>

<div class="form-field">
    <label for="body">Текст статьи</label>
    <textarea id="body" name="body" rows="9" required
        @error('body') aria-invalid="true" aria-describedby="body-error" @enderror>{{ is_string($body) ? $body : '' }}</textarea>
    @error('body')
        <p class="field-error" id="body-error">{{ $message }}</p>
    @enderror
</div>
