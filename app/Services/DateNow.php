<?php

namespace App\Services;

class DateNow
{
    public static function dateNow()
    {
        $arr = [
        'Січень',
        'Лютий',
        'Березень',
        'Квітень',
        'Травень',
        'Червень',
        'Липень',
        'Серпень',
        'Вересень',
        'Жовтень',
        'Листопад',
        'Грудень'
    ];

        $month = date('n') - 1;

        return $arr[$month] . ' ' . date('d, Y, H:i:s');
    }
}