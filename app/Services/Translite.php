<?php

namespace App\Services;

class Translite
{
    public static function translit($st)
    {
        $st = mb_strtolower($st, "utf-8");

        $replacements = [
            '?' => '_', '!' => '_', '.' => '.', ',' => '_', ':' => '_', ';' => '_', '*' => '_', '(' => '_', ')' => '_', '{' => '_', '}' => '_', '[' => '_', ']' => '_', '%' => '_', '#' => '-sharp', '№' => '_', '@' => '@', '$' => '$', '^' => '_', '-' => '-', '+' => '-plus', '/' => '_', '\\' => '_', '=' => '_', '|' => '_', '"' => '_', '\'' => '_',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k',
            'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h',
            'ъ' => '', 'ы' => 'i', 'э' => 'e', ' ' => '-', 'ж' => 'zh', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch',
            'ь' => '', 'ю' => 'yu', 'я' => 'ya', 'ї' => 'yi', 'є' => 'ye'
        ];

        $st = strtr($st, $replacements);
        $st = preg_replace('/^-+|-+$/', '', $st);

        return $st;
    }
}