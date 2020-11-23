<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategory () {
        $newsCategory = CATEGORY::getCategory();
        return view('newsCategory',[
            'newsCategory' => $newsCategory
        ]);
    }

    public function getOneCategory ($id) {
        $allNews = News::getNews();
        for ($i=0; $i<count($allNews);$i++){
            if($allNews[$i]['category_id'] == $id){
                $oneCategory[] = $allNews[$i];
            }
        }
        return view('newsOneCategory',[
            'oneCategory' => $oneCategory
        ]);
    }
}
