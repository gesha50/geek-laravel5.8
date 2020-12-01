<?php


namespace App\Models;

use DB;

class News
{

    public static function getNews () {
        return  DB::select('SELECT * FROM news');
    }

    public static function getNewsById ($id) {
        $result =  DB::selectOne('SELECT * FROM news WHERE id = :id', ['id' => $id]);
        return $result;
    }

    public static function addNews ($array, $img){

//        $json = file_get_contents("./news.json");
//        self::$news = json_decode($json, true);

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
            'description' => $array['description'],
            'image' =>  $img
        ];

//        self::$news['news'][$id] = $arr;
//        file_put_contents('./news.json', json_encode(self::$news));
//        return self::$news;
    }

    public static function getId () {
        return array_key_last(self::$news['news']);
    }

    public static function delete ($id){
        $news = DB::table('news')
            ->where('id', '=', $id)
            ->delete();
    }
}
