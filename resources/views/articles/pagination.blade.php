@if ($paginator->hasPages())
    <nav class="article-pagination" aria-label="Страницы статей">
        @if ($paginator->previousPageUrl())
            <a rel="prev" href="{{ $paginator->previousPageUrl() }}">Назад</a>
        @endif

        <span aria-current="page">Страница {{ $paginator->currentPage() }} из {{ $paginator->lastPage() }}</span>

        @if ($paginator->nextPageUrl())
            <a rel="next" href="{{ $paginator->nextPageUrl() }}">Вперёд</a>
        @endif
    </nav>
@endif
