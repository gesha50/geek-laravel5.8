<?php

namespace App\Http\Controllers;

use App\Library\Calc;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategory() {
        $category = CATEGORY::getCategory();
        return view('category',[
            'newsCategory' => $category
        ]);
    }

    public function getOneCategory ($id) {
        $category = CATEGORY::getCategory();
        $allNews = News::getNews();
        for ($i=0; $i<count($allNews);$i++){
            if($allNews[$i]['category_id'] == $id){
                $oneCategory[] = $allNews[$i];
            }
        }
        return view('newsOneCategory',[
            'oneCategory' => $oneCategory,
            'newsCategory' => $category
        ]);
    }
}
