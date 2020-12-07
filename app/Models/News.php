<?php


namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'image',
        'category_id',
        'is_private',
        'title',
        'spoiler',
        'description'
    ];

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
}
