<?php

namespace App\Services;

use App\Services\Select;

class UserInfo
{
    public static function userInfo($data)
    {
//        die(print_r($data));
        $full_name = $data['first_name'] . ' ' . $data['last_name'];

        $count_of_posts = self::countOfPosts($data['ids']);


        $group = self::isGroup($data['user_group']);


        $avatar = self::userAvatar($data['avatar']);

        return array('full_name' => $full_name, 'count' => $count_of_posts, 'group' => $group, 'avatar' => $avatar);
    }

    public static function isGroup($user_group)
    {
        if ($user_group == '1') {
            $group = 'Користувач';
        } elseif ($user_group == '2') {
            $group = 'Модератор';
        } elseif ($user_group == '3'){
            $group = 'Адмін';
        }

        return $group;
    }

    public static function userAvatar($user_avatar)
    {
        if ($user_avatar == NULL) {
            $avatar = '/img/avatar-placeholder.png';
        } else {
            $avatar = $user_avatar;
        }

        return $avatar;
    }

    public static function countOfPosts($id)
    {

        $count_of_posts = Select::selectCountOfPostsOnUser($id);
        $count_of_posts = mysqli_fetch_assoc($count_of_posts);

        return $count_of_posts['COUNT(*)'];
    }
}