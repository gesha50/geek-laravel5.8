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
        dd($array);
        $json = file_get_contents("./news.json");
        self::$news = json_decode($json, true);

        if (isset($array['isPrivate'])){
            $isPrivate = true;
        } else {
            $isPrivate = false;
        }
        $id = self::getId() + 1;
        $arr = [
            'id' => $id,
            'category_id' => $array['categories'],
            'isPrivate' => $isPrivate,
            'title' => $array['title'],
            'description' => $array['description']
        ];

        self::$news['news'][$id] = $arr;
        file_put_contents('./news.json', json_encode(self::$news));
        return self::$news;
    }

    public static function getId () {
        return array_key_last(self::$news['news']);
    }

    public static function delete ($id){
        $json = file_get_contents("./news.json");
        self::$news = json_decode($json, true);

        unset(self::$news['news'][$id]);
        file_put_contents('./news.json', json_encode(self::$news));
        return self::$news;
    }
}
