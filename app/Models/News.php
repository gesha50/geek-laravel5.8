<?php


namespace App\Models;

use DB;

class News
{

    public static function getNews () {
        return  DB::select('SELECT * FROM news order by id DESC');
    }

    public static function getNewsById ($id) {
        $result =  DB::selectOne('SELECT * FROM news WHERE id = :id', ['id' => $id]);
        return isset($result) ? $result : null;
    }

    public static function addNews ($array, $img){
        if (isset($array['is_private'])){
            $isPrivate = 1;
        } else {
            $isPrivate = 0;
        }
        $arr = [
            'category_id' => $array['category_id'],
            'image' =>  $img,
            'is_private' => $isPrivate,
            'title' => $array['title'],
            'spoiler' => $array['spoiler'],
            'description' => $array['description'],
        ];
        return DB::insert("insert into news
                    (category_id, image, is_private, title, spoiler, description)
                    values (:category_id, :image, :is_private, :title, :spoiler, :description)", $arr);
    }

//    public static function getMaxId () {
//        return DB::table('news')->max('id');
//    }

    public static function delete ($id){
        $news = DB::table('news')
            ->where('id', '=', $id)
            ->delete();
    }
}
