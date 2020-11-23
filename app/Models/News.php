<?php


namespace App\Models;


class News
{
    const NEWS = [
        [
            'id' => '0',
            'category_id' => '2',
            'title' => 'Новость про образование',
            'description' => 'очень интересная новость!'
        ],
        [
            'id' => '1',
            'category_id' => '3',
            'title' => 'Новость про отдых',
            'description' => 'очень интересная новость!'
        ],
        [
            'id' => '2',
            'category_id' => '1',
            'title' => 'Новость про спорт',
            'description' => 'очень интересная новость!'
        ],
        [
            'id' => '3',
            'category_id' => '4',
            'title' => 'Новость про пандемию',
            'description' => 'очень интересная новость!'
        ],
        [
            'id' => '4',
            'category_id' => '0',
            'title' => 'Новость про политику',
            'description' => 'очень интересная новость!'
        ],
        [
            'id' => '5',
            'category_id' => '1',
            'title' => 'Новость про спорт 2',
            'description' => 'очень интересная новость!'
        ],
    ];

    public static function getNews () {
        return self::NEWS;
    }

}
