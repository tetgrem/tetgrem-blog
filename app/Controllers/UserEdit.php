<?php

namespace App\Controllers;

use App\Services\DB_connect;
use App\Services\Router;
use App\Services\Select;

class UserEdit
{
    public static function userEdit($data, $files)
    {
        $user = $_GET['user'];
        $username = $data['username'];

        if ($username != $_SESSION['user']['username']) {
            $check_user = Select::selectOneUser($username);
            if (mysqli_fetch_assoc($check_user) > 0) {
                $_SESSION['message-error'] = 'Такий логін вже зайнятий!';
                Router::redirect('/user-edit');
                die();
            }
        }

        $first_name = $data['first_name'];
        $last_name = $data['last_name'];

        $img = $files['avatar'];

        if (!empty($img['name'])) {
            $file_name = time() . '_' . $img['name'];
            $path = 'uploads/posts_img/' . $file_name;
            $db_path = '/' . $path;
            move_uploaded_file($img['tmp_name'], $path);
            $img_sql = "`avatar`='$db_path' ";
        } else {
            $img_sql = "";
        }



        $sql = "UPDATE `users` SET `username`='$username', `first_name`='$first_name', `last_name`='$last_name',  {$img_sql} WHERE `username`='$user'";
        mysqli_query(DB_connect::db_connect(), $sql);

        $user = Select::selectOneUser($username);
        $user = mysqli_fetch_assoc($user);



        $_SESSION['user']['username'] = $user['username'];
        $_SESSION['user']['first_name'] = $user['first_name'];
        $_SESSION['user']['last_name'] = $user['last_name'];
        $_SESSION['user']['avatar'] = $user['avatar'];

        if (isset($_SESSION['message'])) {
            $_SESSION['message'] = null;
        }

        $_SESSION['message'] = 'Інформація успішно обновлена';

        Router::redirect('/profile');
    }



    public static function userAdminEdit($data)
    {
        $user = $_GET['user'];

        $username = $data['username'];
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $user_group = $data['category'];

        if ($user != $username) {
            $user_check = Select::selectOneUser($username);
            if (mysqli_fetch_assoc($user_check) > 0 ) {
                $_SESSION['message-error'] = 'Такий логін вже зайнятий!';
                Router::redirect('/admin/user-edit?user=' . $user);
                die();
            }
        }

        $sql = "UPDATE `users` SET `username`='$username', `first_name`='$first_name', `last_name`='$last_name', `user_group`='$user_group' WHERE `username`='$user'";
        mysqli_query(DB_connect::db_connect(), $sql);

        $_SESSION['message'] = 'Інформація успішно обновлена';

        Router::redirect('/' . $username);

    }

    public static function userAdminDeleteAvatar()
    {
        $user = $_GET['user'];

        $sql = "UPDATE `users` SET `avatar` = NULL WHERE `username`='$user'";
        mysqli_query(DB_connect::db_connect(), $sql);

        $_SESSION['message'] = 'Аватар видалений';

        Router::redirect('/' . $user);
    }


    public static function userAdminDeleteUser()
    {
        $user = $_GET['user'];

        $sql = "DELETE FROM `users` WHERE `username`='$user'";
        mysqli_query(DB_connect::db_connect(), $sql);

        $_SESSION['message'] = 'Користувач видалений';

        Router::redirect('/');

    }
}