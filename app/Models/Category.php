<?php


namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public static function getCategory () {
        return DB::select('SELECT * FROM category');
    }

    public static function getOneCategory($id) {
        $news = DB::table('news')
            ->where('category_id', '=', $id)
            ->get();
        return $news;
    }

    public static function getMaxId () {
        return DB::table('category')->max('id');
    }
}
