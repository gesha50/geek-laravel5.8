<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    //
    public function index () {
        return view('news',[
            'news' => News::getNews(),
            'newsCategory' => CATEGORY::getCategory()
        ]);
    }

    public function oneNews ($id) {
        $oneNews = News::getNews();
        return view('oneNews',[
            'oneNews' => $oneNews[$id],
            'newsCategory' => CATEGORY::getCategory()
        ]);
    }
}
