<?php

namespace App\Controllers;

use App\Services\DB_connect;
use App\Services\Router;

class Todo
{
    public static function addTodo($data)
    {
        $text = $data['todo'];
        $text = str_replace("'", "\'", $text);
        mysqli_query(DB_connect::db_connect(), "INSERT INTO `todo`(`id`, `text`, `status`) VALUES (NULL,'$text','1')");
        Router::redirect('/todo');
    }

    public static function done()
    {
        $id = $_GET['id'];

        mysqli_query(DB_connect::db_connect(), "UPDATE `todo` SET `status` = '0' WHERE `todo`.`id` = '$id';");
        Router::redirect('/todo');
    }

    public static function delete()
    {
        $id = $_GET['id'];

        mysqli_query(DB_connect::db_connect(), "DELETE FROM `todo` WHERE `todo`.`id` = $id");
        Router::redirect('/todo');
    }
}