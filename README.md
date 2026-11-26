# Вестник

Новостной сайт на Laravel и Blade. В лабораторной № 1 создан общий макет, в № 2 подключены лента новостей и галерея, в № 3 добавлена форма регистрации, в № 4 — список статей из базы данных.

| Адрес | Страница |
| --- | --- |
| `/` | Приветствие и новости |
| `/articles` | Статьи из базы данных |
| `/about` | О нас |
| `/contacts` | Контакты |
| `/galery/{article}` | Полная фотография и описание новости |
| `/signin` | Форма регистрации (GET) и обработка данных (POST) |

Все страницы используют общий шаблон `resources/views/layouts/app.blade.php` с меню и подвалом. В `routes/web.php` маршрут `/contacts` передаёт массив `$contacts` вторым аргументом функции `view()`. Шаблон `resources/views/contacts.blade.php` выводит каждый элемент массива через `@foreach`. Для добавления контакта достаточно дописать элемент с полями `label` и `value`. Поле `url` добавляет ссылку.

`MainController::index()` читает `public/articles.json` и передаёт массив новостей в `home.blade.php`. На главной отображаются дата, заголовок, краткое описание и миниатюра из `preview_image`. Если `shortDesc` отсутствует, выводится начало `desc`. Миниатюра ведёт на маршрут `/galery/{article}`, где `article` — позиция записи в массиве, начиная с нуля. Шаблон `galery.blade.php` показывает `full_image` и полный текст новости.

`AuthController::create()` открывает `resources/views/auth/signin.blade.php`. Форма отправляет имя, email и пароль на `POST /signin` и передаёт CSRF-токен через `@csrf`. Метод `registration()` проверяет обязательные поля, формат email и длину пароля от 8 символов. При ошибках форма показывает сообщения у полей. При успешной проверке контроллер возвращает JSON `registration.json` с именем и email. Пароль используется для проверки, а создание аккаунта в базе не входит в этот этап.

Миграция создаёт таблицу `articles` с заголовком, текстом и датой публикации. `ArticleFactory` генерирует эти поля с помощью Faker, а `DatabaseSeeder` создаёт 12 записей при первом заполнении пустой таблицы. `ArticleController::index()` читает записи через модель `Article`, сортирует по дате публикации и передаёт их в `articles/index.blade.php`.

## Запуск

Понадобятся PHP 8.3 или новее и Composer. Для статей используется локальная база SQLite.
Если в Windows отключены расширения `fileinfo`, `mbstring`, `openssl` или `pdo_sqlite`, включите их в файле `php.ini`. Его расположение покажет `php --ini`.

1. Выполните `composer install`.
2. Скопируйте `.env.example` в `.env` (`Copy-Item .env.example .env` в PowerShell или `cp .env.example .env` в Bash).
3. Заполните `SITE_AUTHOR` и `SITE_GROUP` в `.env`, чтобы в подвале отображались ваши ФИО и группа.
4. Выполните `php artisan key:generate`.
5. Создайте файл SQLite, если его ещё нет, командой `php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"` и выполните `php artisan migrate --seed`.
6. Запустите `php artisan serve` и откройте [главную страницу](http://localhost:8000) или [список статей](http://localhost:8000/articles).
