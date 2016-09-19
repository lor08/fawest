<?php

Admin::menu()->url('/')->label('Главная')->icon('fa-dashboard');
Admin::menu(App\Models\Option::class)->label('Настройки')->icon('fa-tasks');
Admin::menu(App\Models\Page::class)->label('Страницы')->icon('fa-copy');
Admin::menu()->label('Пользователи')->icon('fa-users')->items(function () {
    Admin::menu(App\Permit::class)->label('Права')->icon('fa-key');
    Admin::menu(App\Role::class)->label('Роли')->icon('fa-graduation-cap');
    Admin::menu(App\User::class)->label('Юзеры')->icon('fa-user');
});
Admin::menu()->label('Новости')->icon('fa-hacker-news')->items(function () {
    Admin::menu(App\Models\News::class)->label('Новости')->icon('fa-cubes');
    Admin::menu(App\Models\NewsCategory::class)->label('Категории')->icon('fa-cubes');
});
