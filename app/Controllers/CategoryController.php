<?php

namespace App\Controllers;

use App\Services\DB_connect;
use App\Services\Select;
use App\Services\Router;

class CategoryController
{

    public static function categoryAdd($data, $proposed_cat = false)
    {
        $category_name = $data['category_name'];
        $category_link = $data['category_link'];


        $category_check = Select::selectOneCategory($category_link);

        if (mysqli_fetch_assoc($category_check) > 0 ) {
            if (isset($_SESSION['message-error'])) {
                $_SESSION['message-error'] = null;
            }
            $_SESSION['message-error'] = 'Такий link вже існує!';

            Router::redirect('/admin');
            die();
        }

        $category_check = Select::selectOneCategory($category_name);
        if (mysqli_fetch_assoc($category_check) > 0 ) {
            if (isset($_SESSION['message-error'])) {
                $_SESSION['message-error'] = null;
            }
            $_SESSION['message-error'] = 'Така категорія вже існує!';

            Router::redirect('/admin');
            die();
        }

        $sql = "INSERT INTO `categorys` (`category_id`, `category_name`, `category_link`, `count`) VALUES (NULL, '$category_name', '$category_link', '0')";

        mysqli_query(DB_connect::db_connect(), $sql);

        if (!$proposed_cat) {
            if (isset($_SESSION['message'])) $_SESSION['message'] = null;
            $_SESSION['message'] = 'Категорія успішно добавлена';

            Router::redirect('/admin');
        }
    }


    public static function categoryDelete()
    {
        $link = $_GET['link'];

        $sql = "DELETE FROM `categorys` WHERE `category_link`='$link'";

        mysqli_query(DB_connect::db_connect(), $sql);

        if (isset($_SESSION['message'])) $_SESSION['message'] = null;
        $_SESSION['message'] = 'Категорія успішно видалена';

        Router::redirect('/admin');
    }

    public static function categoryEdit($data)
    {
        if (!isset($_GET['name']) || !isset($_GET['link'])) Router::redirect('/');


        $old_name = $_GET['name'];
        $old_link = $_GET['link'];


        $category_name = $data['category_name'];
        $category_link = $data['category_link'];

        if ($old_link != $category_link) {
            $category_check = Select::selectOneCategory($category_link);

            if (mysqli_fetch_assoc($category_check) > 0 ) {
                if (isset($_SESSION['message-error'])) {
                    $_SESSION['message-error'] = null;
                }
                $_SESSION['message-error'] = 'Такий link вже існує!';

                Router::redirect('/admin');
                die();
            }
        }

        if ($old_name != $category_name) {
            $category_check = Select::selectOneCategory($category_name);

            if (mysqli_fetch_assoc($category_check) > 0 ) {
                if (isset($_SESSION['message-error'])) {
                    $_SESSION['message-error'] = null;
                }
                $_SESSION['message-error'] = 'Така категорія вже існує!';

                Router::redirect('/admin');
                die();
            }
        }

        $sql = "UPDATE `categorys` SET `category_name` = '$category_name', `category_link` = '$category_link' WHERE `categorys`.`category_link`='$old_link'";

        mysqli_query(DB_connect::db_connect(), $sql);

        if (isset($_SESSION['message'])) $_SESSION['message'] = null;
        $_SESSION['message'] = 'Категорія успішно редагована';

        Router::redirect('/admin');

    }
}