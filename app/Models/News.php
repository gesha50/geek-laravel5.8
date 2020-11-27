<?php


namespace App\Models;


class News
{
    const NEWS = [
        [
            'id' => '0',
            'category_id' => '2',
            'title' => 'Образование',
            'description' => 'очень интересная новость!'
        ],
        [
            'id' => '1',
            'category_id' => '3',
            'title' => 'Отдых',
            'description' => 'очень интересная новость!'
        ],
        [
            'id' => '2',
            'category_id' => '1',
            'title' => 'Спорт',
            'description' => 'очень интересная новость!'
        ],
        [
            'id' => '3',
            'category_id' => '4',
            'title' => 'Пандемия',
            'description' => 'очень интересная новость!'
        ],
        [
            'id' => '4',
            'category_id' => '0',
            'title' => 'Политика',
            'description' => 'очень интересная новость!'
        ],
        [
            'id' => '5',
            'category_id' => '1',
            'title' => 'Спорт 2',
            'description' => 'очень интересная новость!'
        ]
    ];

    public static function getNews () {
        return self::NEWS;
    }
    public static function addNews ($array){
        // не знаю как добавить массив в константу
        // здесь будет метод добавлени в БД
        dd($array);
    }

    public static function delete ($id){
        // не знаю как удалить из константы
        // здесь будет метод удаления из БД
        dd($id);
    }

}
