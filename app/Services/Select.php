<?php

namespace App\Services;

class Select
{
    public static function selectAllPostsWithStatus($status, $limit, $offset)
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT * FROM `posts` 
                                                             JOIN `categorys` ON posts.category_id = categorys.category_id 
                                                             JOIN `users` ON posts.user_ids = users.ids 
                                                             WHERE `status`='$status' 
                                                             ORDER BY `posts`.`id` DESC
                                                             LIMIT $limit OFFSET $offset");
    }

    public static function selectCountOfPostsWithStatus($status)
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT COUNT(*) FROM `posts` WHERE `status`='$status'");
    }

    public static function selectAllPostsWithStatusAdmin($status)
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT * FROM `posts` 
                                                             JOIN `categorys` ON posts.category_id = categorys.category_id 
                                                             JOIN `users` ON posts.user_ids = users.ids 
                                                             WHERE `status`='$status' 
                                                             ORDER BY `posts`.`id` DESC");
    }

    public static function selectAllPosts()
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT * FROM `posts` JOIN `categorys` ON posts.category_id = categorys.category_id 
                                                             JOIN `users` ON posts.user_ids = users.ids ORDER BY `id` DESC");
    }

    public static function selectColumn($table, $column)
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT $column FROM `$table`");
    }

    public static function selectLinks($link, $title, $table)
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT `$link`, `$title` FROM `$table`");
    }

    public static function selectUsersLinks()
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT `username`, `first_name`, `last_name` FROM `users`");
    }

    public static function selectOnePost($data)
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT * FROM `posts` JOIN `categorys` ON posts.category_id = categorys.category_id JOIN `users` ON posts.user_ids = users.ids WHERE `link`='$data' OR `posts`.`id`='$data'");
    }

    public static function selectByColumn($column, $data, $id)
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT * FROM `posts` JOIN `categorys` ON posts.category_id = categorys.category_id JOIN `users` ON posts.user_ids = users.ids WHERE `status`='1' AND `$column`='$data' AND `posts`.`id`<>'$id' ORDER BY rand() LIMIT 4");
    }

    public static function selectAllCount()
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT COUNT(*) FROM `posts` WHERE `status`='1'");
    }

    public static function selectCountOfCategory($category)
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT COUNT(*) FROM `posts` JOIN `categorys` ON posts.category_id = categorys.category_id WHERE `category_link`='$category' AND `status`='1'");
    }

    public static function selectCountOfUserPosts($data)
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT COUNT(*) FROM `posts` JOIN `users` ON posts.user_ids = users.ids WHERE `status`='1' AND `users`.`ids` = '$data' OR `users`.`username`='$username'");
    }

    public static function selectAllCategorys()
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT * FROM `categorys`");
    }

    public static function selectAllByCategory($category, $limit, $offset)
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT * FROM `posts` JOIN `categorys` ON posts.category_id = categorys.category_id JOIN `users` ON posts.user_ids = users.ids WHERE `status`='1' AND `category_link`='$category' ORDER BY `posts`.`id` DESC LIMIT $limit OFFSET $offset");
    }

    public static function selectOneUser($user_data)
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT * FROM `users` WHERE email='$user_data' OR username='$user_data' OR change_key='$user_data' OR email_confirm='$user_data'");
    }

    public static function selectCountOfPostsOnUser($user_id)
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT COUNT(*) FROM `posts` WHERE user_ids='$user_id' AND status='1'");
    }

    public static function selectUserPosts($data, $limit, $offset)
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT * FROM `posts` JOIN `categorys` ON posts.category_id = categorys.category_id JOIN `users` ON posts.user_ids = users.ids  WHERE `status`='1' AND `user_ids`='$data' OR `username`='$data' ORDER BY `posts`.`id` DESC LIMIT $limit OFFSET $offset");
    }

    public static function selectPassword($id)
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT `password` FROM `users` WHERE `users`.`ids`='$id'");
    }

    public static function selectTodo($status)
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT * FROM `todo` WHERE `status`='$status' ORDER BY `id` DESC");
    }

    public static function selectCountOfUsers()
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT COUNT(*) FROM `users`");
    }

    public static function selectAllUsers()
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT * FROM `users`");
    }

    public static function selectOneCategory($category_data)
    {
        return mysqli_query(DB_connect::db_connect(), "SELECT * FROM `categorys` WHERE `category_name`='$category_data' OR `category_link`='$category_data'");
    }
}