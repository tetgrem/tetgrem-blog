<?php

namespace App\Controllers;

use App\Services\Router;
use App\Services\DB_connect;
use App\Services\Select;

class Auth
{

    public function login($data)
    {
        $user_data = $data['data'];
        $password = $data['password'];

        $user = Select::selectOneUser($user_data);
        $user = mysqli_fetch_assoc($user);


        if ($user['email_confirm'] == NULL) {
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user'] = [
                    "ids" => $user['ids'],
                    "username" => $user['username'],
                    "first_name" => $user['first_name'],
                    "last_name" => $user['last_name'],
                    "email" => $user['email'],
                    "avatar" => $user['avatar'],
                    "user_group" => $user['user_group']
                ];
                Router::redirect('/');
            } else {
                if (isset($_SESSION['message-error'])) {
                    $_SESSION['message-error'] = null;
                }

                $_SESSION['message-error'] = 'Не правильний email, логін або пароль';
                Router::redirect('/login');
                die();
            }
        } elseif ($user['email_confirm'] != NULL ) {
            Router::redirect('/register-end');
        }

    }




    public function register($data, $files)
    {
        $email = $data['email'];
        $username = $data['username'];
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $password = $data['password'];
        $password_confirm = $data['password_confirm'];

        if ($password !== $password_confirm) {
            die('Паролі не співпадають');
        }

        $avatar = $files['avatar'];
        if ($avatar['name'] == '') {
            $db_path = NULL;
        } else {
            $file_name = time() . '_' . $avatar['name'];
            $path = 'uploads/avatars/' . $file_name;
            $db_path = '/' . $path;
            move_uploaded_file($avatar['tmp_name'], $path);
        }

        $hash_pass = password_hash($password, PASSWORD_DEFAULT);


        $check_user = mysqli_query(DB_connect::db_connect(), "SELECT username FROM `users` WHERE username='$username'");
        if (mysqli_fetch_array($check_user) > 0) {
            $_SESSION['test'] = [
                'email' => $email,
                'username' => $username,
                'first_name' => $first_name,
                'last_name' => $last_name,
            ];
            if (isset($_SESSION['message-error'])) {
                $_SESSION['message-error'] = null;
            }

            $_SESSION['message-error'] = 'Користувач з таким логіном вже існує!';
            Router::redirect('/register');
            die();
        }

        $check_user = mysqli_query(DB_connect::db_connect(), "SELECT email FROM `users` WHERE email='$email'");
        if (mysqli_fetch_array($check_user) > 0) {
            $_SESSION['test'] = [
                'email' => $email,
                'username' => $username,
                'first_name' => $first_name,
                'last_name' => $last_name,
            ];
            if (isset($_SESSION['message-error'])) {
                $_SESSION['message-error'] = null;
            }

            $_SESSION['message-error'] = 'Користувач з таким email вже існує!';
            Router::redirect('/register');
            die();
        }

        $email_key = md5($email . rand(1000, 9999));

        $url = 'http://tetgrem.com/email-confirm?emailkey=' . $email_key;

        $message = $first_name  . ' ' . $last_name  . ', підтвердіть ваш email. \n\n Для підтвердження перейдіть по посиланню: ' . $url;

        mail($email, 'Підтвердження Email', $message);

        if(isset($_SESSION['email-for-link'])) {
            $_SESSION['email-for-link'] = null;
        }

        $_SESSION['email-for-link'] = mb_substr(stristr($email, '@'), 1);

        mysqli_query(DB_connect::db_connect(), "INSERT INTO `users` (`ids`, `email`, `username`, `first_name`, `last_name`, `avatar`, `password`, `user_group`, `email_confirm`) VALUES (NULL, '$email', '$username', '$first_name', '$last_name', '$db_path', '$hash_pass', 1, '$email_key')");
        $_SESSION['test'] = null;
        Router::redirect('/register-end');
    }



    public function logout()
    {
        unset($_SESSION['user']);
        Router::redirect('/login');
    }

    public function forgot($data)
    {
        $email = $data['email'];

        $user = Select::selectOneUser($email);
        $user = mysqli_fetch_assoc($user);



        if (!$user) die('Такого користувача не існує');

        $key = md5($user['username'] . rand(1000, 9999));
        mysqli_query(DB_connect::db_connect(), "UPDATE `users` SET `change_key` = '$key' WHERE `users`.`email` = '$email'");


        if (isset($_SESSION['forgot-pass'])) {
            $_SESSION['forgot-pass'] = null;
        }

        $url = 'http://tetgrem.com/newpass?key=' . $key;
        $message = $user['first_name'] . ' ' . $user['last_name'] . ', на Ваш аккаунт був зроблений запит на відновлення паролю. \n\n Для відновлення перейдіть по посиланню: ' . $url . '\n\n Якщо це були не ви, то проігноруйте це повідомлення!';

        mail($email, 'Відновлення паролю', $message);

        $_SESSION['forgot-pass'] = 'Лист був відправлений!';

        Router::redirect('/forgot-password');
    }
}
















