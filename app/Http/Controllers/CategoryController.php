<?php

namespace App\Http\Controllers;

use App\Library\Calc;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends BaseWithCalcController
{

    public function getCategory() {
        //реализация калькулятора
        $res = $this->calc->add(5)->sub(1)->getResult();
//        dd($res);
        $category = CATEGORY::getCategory();
        return view('category',[
            'newsCategory' => $category
        ]);
    }

    public function getOneCategory ($id) {
        $category = CATEGORY::getCategory();
        $allNews = News::getNews()['news'];
        $oneCategory = [];
        foreach ($allNews as $news){
            if($news['category_id'] == $id){
                $oneCategory[] = $news;
            }
        }
        return view('newsOneCategory',[
            'oneCategory' => $oneCategory,
            'newsCategory' => $category
        ]);
    }
}
