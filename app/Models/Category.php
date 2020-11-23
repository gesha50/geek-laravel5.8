<?php


namespace App\Models;


class Category
{
    const CATEGORY = [
        0 => 'Политика',
        1 => 'Спорт',
        2 => 'Образование',
        3 => 'Отдых',
        4 => 'Пандемия',

    ];

    public static function getCategory () {
        return self::CATEGORY;
    }

}
