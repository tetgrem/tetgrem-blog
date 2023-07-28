<?php

namespace App\Services;

class DB_connect
{

    public static function db_connect()
    {
        $connect = mysqli_connect('localhost', 'root', '', 'tetgrem-blog');

        if (!$connect) {
           die('datebase connect error');
        }

        return $connect;
    }

}