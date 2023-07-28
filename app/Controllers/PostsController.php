<?php

namespace App\Controllers;

use App\Services\Router;
use App\Services\Translite;
use App\Services\DateNow;
use App\Services\DB_connect;
use App\Services\Counter;


class PostsController
{
    public static function addPost($data, $files)
    {
        $title = $data['title'];
        $text = $data['text'];

        $check_post = mysqli_query(DB_connect::db_connect(), "SELECT * FROM `posts` WHERE `title`='$title'");
        if (mysqli_fetch_assoc($check_post) > 0) {
            $_SESSION['message-error'] = 'Така публікація вже існує!';
            Router::redirect('/add-post');
            die();
        }

        $img = $files['posts_img'];
        $file_name = time() . '_' . $img['name'];
        $path = 'uploads/posts_img/' . $file_name;
        $db_path = '/' . $path;
        move_uploaded_file($img['tmp_name'], $path);

        $category = $data['category'];
        $user_ids = $_SESSION['user']['ids'];
        $link = Translite::translit($title);
        $date = DateNow::dateNow();

        Counter::counterPlus($category);

        mysqli_query(DB_connect::db_connect(), "INSERT INTO `posts` (`id`, `title`, `text`, `category_id`, `date`, `link`, `img`, `user_ids`, `status`, `new_category`, `comment`) VALUES (NULL, '$title', '$text', '$category', '$date', '$link', '$db_path', '$user_ids', '1', NULL, NULL)");

        if (isset($_SESSION['message-add-post'])) {
            $_SESSION['message-add-post'] = null;
        }

        $_SESSION['message-add-post'] = 'Публікація добавлена';

        Router::redirect('/');
    }



    public static function deletePost()
    {
        $id = $_GET['id'];
        $category_id = $_GET['category_id'];

        Counter::counterMinus($category_id);

        mysqli_query(DB_connect::db_connect(), "DELETE FROM `posts` WHERE `posts`.`id` = '$id'");

        Router::redirect('/');

    }


    public static function editPost($data, $files)
    {
        $id = $_GET['id'];
        $title = $data['title'];
        $text = $data['text'];
        $category = $data['category'];
        $status = $data['status'];

        $img = $files['posts_img'];

        if (!empty($img['name'])) {
            $file_name = time() . '_' . $img['name'];
            $path = 'uploads/posts_img/' . $file_name;
            $db_path = '/' . $path;
            move_uploaded_file($img['tmp_name'], $path);
            $img_sql = "`img`='$db_path', ";
        } else {
            $img_sql = "";
        }

        $sql = "UPDATE `posts` SET `title`='$title', `text`='$text', `category_id`='$category', {$img_sql}`status`='$status' WHERE `id`='$id'";
        mysqli_query(DB_connect::db_connect(), $sql);

        $link_query = mysqli_query(DB_connect::db_connect(), "SELECT `link` FROM `posts` WHERE `id`='$id'");
        $link = mysqli_fetch_assoc($link_query);

        Router::redirect('/' . $link['link']);
    }


    public static function moderation()
    {
        $id = $_GET['id'];

        mysqli_query(DB_connect::db_connect(), "UPDATE `posts` SET `status`='0' WHERE `id`='$id'");
        $_SESSION['message-add-post'] = 'Публікація відправлена на модерацію';
        Router::redirect('/');
    }
}















