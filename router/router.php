<?php

use App\Services\Router;
use App\Services\Select;
use App\Controllers\Auth;
use App\Controllers\EditPass;
use App\Controllers\Todo;
use App\Controllers\PostsController;
use App\Controllers\UserEdit;
use App\Controllers\CategoryController;
use App\Controllers\NewCategoryController;


$users = Select::selectUsersLinks();

foreach ($users as $el) {
    Router::page('/' . $el['username'], 'user-page', $el['first_name'] . ' ' . $el['last_name']);
}


foreach ($users as $el) {
    Router::page('/posts/' . $el['username'], 'viewSomePosts', 'Публікації користувача: ' . $el['first_name'] . ' ' . $el['last_name']);
}

$categorys = Select::selectLinks('category_link', 'category_name', 'categorys');

foreach ($categorys as $el) {
    Router::page('/category/' . $el['category_link'], 'viewSomePosts',   $el['category_name']);
}


$items = Select::selectLinks('link', 'title', 'posts');

foreach ($items as $item) {
    Router::page('/' . $item['link'], 'viewPost', $item['title']);
}

Router::page('/', 'home', 'Головна');
Router::page('/login', 'login', 'Авторизація');
Router::page('/register', 'register', 'Реєстрація');
Router::page('/add-post', 'addPost', 'Добавити публікацію');
Router::page('/add-post/new-category', 'addPostWithNewCategory', 'Запропонувати нову категорію');
Router::page('/edit-post', 'editPost', 'Редагувати публікацію');
Router::page('/profile', 'profile', 'Мій профіль');
Router::page('/admin', 'admin', 'Адмін панель');
Router::page('/moder', 'moder', 'Панель модератора');
Router::page('/admin/edit-user', 'editUser', 'Редагувати користувача');
Router::page('/my-posts', 'viewSomePosts', 'Мої пости');
Router::page('/todo', 'todo', 'todo');
Router::page('/forgot-password', 'forgot-password', 'Відновлення паролю');
Router::page('/newpass', 'newpass', 'Відновлення паролю');
Router::page('/email-confirm', 'email-confirm', 'Підтвердження Email');
Router::page('/register-end', 'register-end', 'Підтвердження Email');
Router::page('/user-edit', 'user-edit', 'Редагування профілю');
Router::page('/admin/user-edit', 'admin-user-edit', 'Редагування користувача');

Router::post('/auth/register', Auth::class, 'register', true, true);
Router::post('/auth/login', Auth::class, 'login', true);
Router::post('/auth/logout', Auth::class, 'logout');
Router::post('/auth/forgot-password', Auth::class, 'forgot', true);

Router::post('/user/edit', UserEdit::class, 'userEdit', true, true);
Router::post('/user/admin-edit', UserEdit::class, 'userAdminEdit', true);
Router::post('/user/admin-delete-avatar', UserEdit::class, 'userAdminDeleteAvatar');
Router::post('/user-delete', UserEdit::class, 'userAdminDeleteUser');


Router::post('/posts/add-post', PostsController::class, 'addPost', true, true);
Router::post('/posts/deletePost', PostsController::class, 'deletePost');
Router::post('/posts/editPost', PostsController::class, 'editPost', true, true);
Router::post('/posts/moderation', PostsController::class, 'moderation');

Router::post('/posts/add-post-new-category', NewCategoryController::class, 'proposedCategory', true, true);
Router::post('/posts/add-post-and-new-category', NewCategoryController::class, 'addProposedCategory');
Router::post('/posts/delete-post-with-new-category', NewCategoryController::class, 'deleteProposedCategory');

Router::post('/todo/add', Todo::class, 'addTodo', true);
Router::post('/todo/done', Todo::class, 'done');
Router::post('/todo/delete', Todo::class, 'delete');

Router::post('/admin/category/add', CategoryController::class, 'categoryAdd', true);
Router::post('/admin/category/delete', CategoryController::class, 'categoryDelete');
Router::post('/admin/category/edit', CategoryController::class, 'categoryEdit', true);


Router::post('/user/edit-pass', EditPass::class, 'editPass', true);
Router::post('/auth/newpass', EditPass::class, 'newPass', true);
Router::enable();