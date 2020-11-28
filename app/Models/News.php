<?php


namespace App\Models;


class News
{
    static public $news = [];

    public static function getNews () {

        $json = file_get_contents("./news.json");
        self::$news = json_decode($json, true);
        return self::$news;
    }
    public static function addNews ($array){
        $json = file_get_contents("./news.json");
        self::$news = json_decode($json, true);
        $arr = [
            'id' => count(self::$news['news']),
            'category_id' => '1',
            'title' => $array['title'],
            'description' => $array['description']
        ];

        self::$news['news'][count(self::$news['news'])] = $arr;
        file_put_contents('./news.json', json_encode(self::$news));
        return self::$news;
    }

    public static function delete ($id){
        $json = file_get_contents("./news.json");
        self::$news = json_decode($json, true);

        unset(self::$news['news'][$id]);
        file_put_contents('./news.json', json_encode(self::$news));
        return self::$news;
    }

}
