# Вестник

Лабораторная работа № 1. Макет новостного сайта на Laravel и Blade.

| Адрес | Страница |
| --- | --- |
| `/` | Приветствие |
| `/about` | О нас |
| `/contacts` | Контакты |

Все страницы используют общий шаблон `resources/views/layouts/app.blade.php` с меню и подвалом. В `routes/web.php` маршрут `/contacts` передаёт массив `$contacts` вторым аргументом функции `view()`. Шаблон `resources/views/contacts.blade.php` выводит каждый элемент массива через `@foreach`. Для добавления контакта достаточно дописать элемент с полями `label` и `value`. Поле `url` добавляет ссылку.

## Запуск

Понадобятся PHP 8.3 или новее и Composer. База данных и сборка CSS для этих страниц не требуются.
Если в Windows отключены расширения `fileinfo`, `mbstring` или `openssl`, включите их в файле `php.ini`. Его расположение покажет `php --ini`.

1. Выполните `composer install`.
2. Скопируйте `.env.example` в `.env` (`Copy-Item .env.example .env` в PowerShell или `cp .env.example .env` в Bash).
3. Заполните `SITE_AUTHOR` и `SITE_GROUP` в `.env`, чтобы в подвале отображались ваши ФИО и группа.
4. Выполните `php artisan key:generate`, затем `php artisan serve`.
5. Откройте [главную страницу](http://localhost:8000).
