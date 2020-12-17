<?php

namespace App\Http\Controllers\Admin;

use App\Library\Translit;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index () {
        $xml = XmlParser::load('https://news.yandex.ru/cosmos.rss');
        $data = $xml->parse([
            'category' => ['uses' => 'channel.title'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate]'],
        ]);
        $category = substr($data['category'], 29);
        $categoryInDB = DB::table('category')->pluck('title');
        $isCategoryInDB = false;
        foreach ($categoryInDB as $oneCategoryInDB) {
            if ($oneCategoryInDB == $category){
                $isCategoryInDB = true;
            }
        }
        if (!$isCategoryInDB){
            $slugCategory = Str::slug($category);
            DB::table('category')->insert(['title' => $category, 'slug' => $slugCategory]);
        }
        $categoryID = DB::table('category')->where('title', $category)->first('id');
        $isNewsInDB = false;
        foreach ($data['news'] as $oneNews) {
            $newsToDB = [
                'category_id' => $categoryID->id,
                'image' => "",
                'is_private' => 0,
                'title' => $oneNews['title'],
                'spoiler' => $oneNews['pubDate'],
                'description' => $oneNews['description']
            ];
            $newsInDB = DB::table('news')->pluck('title');
            foreach ($newsInDB as $oneNewsInDB) {
                // Здесь наверно лучше другой ключ использовать в дальнейшем
                if ($oneNewsInDB == $oneNews['title']){
                    $isNewsInDB = true;
                }
            }
            if (!$isNewsInDB){
                DB::table('news')->insert($newsToDB);
            }
        }
        if ($isNewsInDB) {
            return redirect('/admin/news')->with('info', 'Некоторые новости уже были в БД');
        }
        return redirect('/admin/news')->with('success', 'Новости успешно добавлены!');
    }
}
