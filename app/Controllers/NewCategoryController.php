<?php

namespace App\Controllers;

use App\Services\DateNow;
use App\Services\DB_connect;
use App\Services\Router;
use App\Services\Select;
use App\Services\Translite;
use App\Services\Counter;

class NewCategoryController
{
    //Функціонал пропонування нової категорії
    public static function proposedCategory($data, $files)
    {
        $title = $data['title'];
        $text = $data['text'];

        $check_post = mysqli_query(DB_connect::db_connect(), "SELECT * FROM `posts` WHERE `title`='$title'");
        if (mysqli_fetch_assoc($check_post) > 0) {
            $_SESSION['message-error'] = 'Така публікація вже існує!';
            Router::redirect('/add-post');
            die();
        }

        $category = $data['category'];
        $user_ids = $_SESSION['user']['ids'];
        $link = Translite::translit($title);
        $date = DateNow::dateNow();
        $new_category = $data['new_category'];
        $comment = $data['comment'];


        $img = $files['posts_img'];
        $file_name = time() . '_' . $img['name'];
        $path = 'uploads/posts_img/' . $file_name;
        $db_path = '/' . $path;
        move_uploaded_file($img['tmp_name'], $path);

        mysqli_query(DB_connect::db_connect(), "INSERT INTO `posts` (`id`, `title`, `text`, `category_id`, `date`, `link`, `img`, `user_ids`, `status`, `new_category`, `comment`) VALUES (NULL, '$title', '$text', '5', '$date', '$link', '$db_path', '$user_ids', '2', '$new_category', '$comment')");

        if (isset($_SESSION['message-add-post'])) {
            $_SESSION['message-add-post'] = null;
        }

        $_SESSION['message-add-post'] = 'Категорія запропонована. Чекайте рішення...';

        Router::redirect('/');
    }

    //Функціонал додавання нової категорії
    public static function addProposedCategory()
    {
        $id = $_GET['id'];

        $post = Select::selectOnePost($id);
        $post = mysqli_fetch_assoc($post);

        $category_name = $post['new_category'];
        $category_link = Translite::translit($post['new_category']);

        $data = array('category_name' => $category_name, 'category_link' => $category_link);

        CategoryController::categoryAdd($data, true);

        $category_id = Select::selectOneCategory($category_link);
        $category_id = mysqli_fetch_assoc($category_id);
        $category_id = $category_id['category_id'];

        Counter::counterPlus($category_id);

        $sql = "UPDATE `posts` SET `category_id` = '$category_id', `status` = '1', `new_category` = NULL, `comment` = NULL WHERE `posts`.`id` = '$id'";

        mysqli_query(DB_connect::db_connect(), $sql);

        if (isset($_SESSION['message-add-post'])) {
            $_SESSION['message-add-post'] = null;
        }

        $_SESSION['message-add-post'] = 'Публікація добавлена';

        Router::redirect('/');
    }


    public static function deleteProposedCategory()
    {
        $id = $_GET['id'];

        $sql = "DELETE FROM `posts` WHERE `id`='$id'";

        mysqli_query(DB_connect::db_connect(), $sql);

        if (isset($_SESSION['message-add-post'])) {
            $_SESSION['message-add-post'] = null;
        }

        $_SESSION['message-add-post'] = 'Видалено';

        Router::redirect('/');
    }

}