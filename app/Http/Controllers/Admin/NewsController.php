<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function allNews () {
        return view('admin.allNews',[
            'news' => News::getNews(),
            'newsCategory' => CATEGORY::getCategory(),
            'isAdmin' => true
        ]);
    }

    public function oneNews ($id) {
        $oneNews = News::getNews();
        return view('admin.oneNews',[
            //'oneNews' => $oneNews[$id],
            'newsCategory' => CATEGORY::getCategory(),
            'isAdmin' => true
        ]);
    }

    public function add (Request $request) {

        if ($request->method() == 'POST'){
            News::addNews($request->only('title', 'description', 'isPrivate'));
            redirect(route('admin/news'));
        }

        return view('admin.add',[
            //'news' => News::getNews(),
            'newsCategory' => CATEGORY::getCategory(),
            'isAdmin' => true
        ]);
    }

    public function delete ($id) {
        News::delete($id);
        redirect(route('admin.news'));
    }

}
