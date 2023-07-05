<?php

use App\Services\Router;

Router::page('/', 'home', 'Головна');
Router::page('/login', 'login', 'Авторизація');
Router::page('/register', 'register', 'Реєстрація');
Router::page('/addpost', 'addPost', 'Добавити публікацію');
Router::page('/profile', 'profile', 'Мій профіль');
Router::page('/admin', 'admin', 'Адмін панель');

Router::enable();