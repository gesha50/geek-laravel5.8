<?php


namespace App\Models;
use DB;

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

    public static function getOneCategory($id) {
        $news = DB::table('news')
            ->where('category_id', '=', $id)
            ->get();
        return $news;
    }
}
