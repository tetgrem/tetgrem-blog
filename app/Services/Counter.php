<?php

namespace App\Services;

class Counter
{
    public static function counterPlus($id)
    {
        $count = mysqli_query(DB_connect::db_connect(), "SELECT COUNT(*) FROM `posts` JOIN `categorys` ON posts.category_id = categorys.category_id WHERE `status`='1' AND categorys.category_id='$id'");
        $count = mysqli_fetch_assoc($count);
        $count = $count['COUNT(*)'];
        $count = $count + 1;

        mysqli_query(DB_connect::db_connect(), "UPDATE `categorys` SET `count` = '$count' WHERE `categorys`.`category_id` = '$id'");

    }

    public static function counterMinus($id)
    {
        $count = mysqli_query(DB_connect::db_connect(), "SELECT COUNT(*) FROM `posts` JOIN `categorys` ON posts.category_id = categorys.category_id JOIN `users` ON posts.user_ids = users.ids WHERE `status`='1' AND categorys.category_id='$id'");
        $count = mysqli_fetch_assoc($count);
        $count = $count['COUNT(*)'];
        $count = $count - 1;

        mysqli_query(DB_connect::db_connect(), "UPDATE `categorys` SET `count` = '$count' WHERE `categorys`.`category_id` = '$id'");
    }
}