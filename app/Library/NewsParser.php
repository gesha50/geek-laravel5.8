<?php


namespace App\Library;


use App\Library\Interfaces\NewsParserInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class NewsParser implements NewsParserInterface
{
    public function parse ($link) {
        $xml = XmlParser::load($link);
        $data = $xml->parse([
            'category' => ['uses' => 'channel.title'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate]'],
        ]);
        $category = substr($data['category'], 29);
        $isCategoryInDB = $this->checkCategoryInDB($category);

        if (!$isCategoryInDB){
            DB::table('category')->insert(['title' => $category, 'slug' => Str::slug($category)]);
        }

        $categoryID = DB::table('category')->where('title', $category)->first('id');

        $this->checkOrAddNewsInDB($data,$categoryID);
    }

    public function checkCategoryInDB ($category) {
        $categoryInDB = DB::table('category')->pluck('title');
        foreach ($categoryInDB as $oneCategoryInDB) {
            if ($oneCategoryInDB == $category){
                return true;
            }
        }
        return false;
    }

    public function checkOrAddNewsInDB ($data,$categoryID) {
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
    }
}
