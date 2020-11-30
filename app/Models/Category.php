<?php


namespace App\Models;


class Category
{
    const CATEGORY = [

        1 => 'Спорт',
        2 => 'Образование',
        3 => 'Отдых',
        4 => 'Пандемия',
        5 => 'Политика',
    ];

    public static function getCategory () {
        return self::CATEGORY;
    }

}
