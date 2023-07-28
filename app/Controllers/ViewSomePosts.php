<?php

namespace App\Controllers;

use App\Services\Select;

class ViewSomePosts
{
    public static function checkUri($link, $limit, $offset, $username = false)
    {
        $list = explode('/', $link);
        $count = count($list);

        if ($count > 1 && $list[0] === 'category') {

            $count_category = Select::selectCountOfCategory($list[1]);
            $items = Select::selectAllByCategory($list[1], $limit, $offset);
            return array('items' => $items, 'count_category' => $count_category);
        }
        elseif ($count > 1 && $list[0] === 'posts') {
            $count_posts_user = Select::selectCountOfUserPosts($username);
            $items = Select::selectUserPosts($username, $limit, $offset);
            return array('items' => $items, 'count_posts_user' => $count_posts_user);
        }
        elseif ($count === 1) {
            if ($list[0] === 'my-posts') {
                $count_posts_user = Select::selectCountOfUserPosts($_SESSION['user']);
                $items = Select::selectUserPosts($_SESSION['user']['ids'], $limit, $offset);
                return array('items' => $items, 'count_posts_user' => $count_posts_user);
            }
        }
    }
}