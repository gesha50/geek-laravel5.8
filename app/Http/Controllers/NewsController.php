<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    //
    public function index () {
        $category = CATEGORY::getCategory();
        $news = News::getNews();
        return view('news',[
            'news' => $news,
            'newsCategory' => $category
        ]);
    }

    public function oneNews ($id) {
        $category = CATEGORY::getCategory();
        $oneNews = News::getNews();
        return view('oneNews',[
            'oneNews' => $oneNews[$id],
            'newsCategory' => $category
        ]);
    }
}
