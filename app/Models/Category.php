<?php


namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    /**
     * @var mixed
     */
    private $id;
    /**
     * @var mixed
     */
    private $title;

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
