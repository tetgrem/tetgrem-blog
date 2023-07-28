<?php

namespace App\Controllers;

use App\Services\Select;

class PostViewController
{
    public static function postViewAuthorController($data, $id)
    {
        $author = $data['username'];
        return Select::selectByColumn('username', $author, $id);
    }

    public static function postViewCategoryController($data, $id)
    {
        $category = $data['category_link'];
        return Select::selectByColumn('category_link', $category, $id);
    }


}