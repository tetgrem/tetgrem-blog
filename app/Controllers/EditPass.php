<?php

namespace App\Controllers;

use App\Services\DB_connect;
use App\Services\Router;
use App\Services\Select;

class EditPass
{
    public static function editPass($data)
    {
        $password_old = $data['password-old'];
        $password_new = $data['password-new'];

        $id = $_SESSION['user']['ids'];

        $user = Select::selectPassword($id);
        $user = mysqli_fetch_assoc($user);

        if (!$user) {
            die('Не знайдено');
        }

        if (password_verify($password_old, $user['password'])) {
            $hash_pass = password_hash($password_new, PASSWORD_DEFAULT);
            mysqli_query(DB_connect::db_connect(), "UPDATE `users` SET `password` = '$hash_pass' WHERE `users`.`ids` = '$id'");

            if (isset($_SESSION['message'])) {
                $_SESSION['message'] = null;
            }

            $_SESSION['message'] = 'Пароль успішно поміняний!';

            Router::redirect('/profile');

        } else {
            if (isset($_SESSION['message-error'])) {
                $_SESSION['message'] = null;
            }
            $_SESSION['message-error'] = 'Не правильний старий пароль!';
            Router::redirect('/profile');
        }

    }

    public static function newPass($data)
    {
        $password = $data['password'];
        $hash_pass = password_hash($password, PASSWORD_DEFAULT);

        $id = $_SESSION['user-forgot-password']['id'];

        mysqli_query(DB_connect::db_connect(), "UPDATE `users` SET `password` = '$hash_pass', `change_key` = NULL WHERE `users`.`ids` = '$id'");
        Router::redirect('/login');
    }
}