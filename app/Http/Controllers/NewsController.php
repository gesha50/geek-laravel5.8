<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    //
    public function index () {
        $news = News::getNews();
        return view('news',[
            'news' => $news
        ]);
    }

    public function oneNews ($id) {
        $oneNews = News::getNews();
        return view('oneNews',[
            'oneNews' => $oneNews[$id]
        ]);
    }
}
