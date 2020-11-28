<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public $obj;

    public function __construct()
    {
        $this->obj = new News();
    }

    //
    public function index () {
        return view('news',[
            'news' => $this->obj->getNews(),
            'newsCategory' => CATEGORY::getCategory()
        ]);
    }

    public function oneNews ($id) {
        $oneNews = $this->obj->getNews();
        return view('oneNews',[
            'oneNews' => $oneNews[$id],
            'newsCategory' => CATEGORY::getCategory()
        ]);
    }
}
