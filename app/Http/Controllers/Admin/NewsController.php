<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class NewsController extends Controller
{
    public function allNews () {
        $news = News::getNews();
        return view('admin.allNews',[
            'news' => $news,
            'newsCategory' => CATEGORY::getCategory(),
            'isAdmin' => true
        ]);
    }

    public function oneNews ($id) {
        $oneNews = News::getNewsById($id);
//        if ($oneNews = null) {
//            abort(404);
//        }
        return view('admin.oneNews',[
            'oneNews' => $oneNews,
            'newsCategory' => CATEGORY::getCategory(),
            'isAdmin' => true
        ]);
    }

    public function add (Request $request) {

        if ($request->method() == 'POST'){
            $img = 'http://dummyimage.com/250';
            if ($request->hasFile('image')){
                $path = Storage::putFile('public', $request->file('image'));
                $img = Storage::url($path);
            }

            News::addNews($request->only('title', 'description', 'is_private', 'categories', 'spoiler'), $img);
//            $request->flash();
            return redirect(route('admin.news.allNews'));
        } else {
            $arr = CATEGORY::getCategory();
            return view('admin.add',[
                'newsCategory' => $arr,
                'isAdmin' => true
            ]);
        }
    }

    public function delete ($id) {
        News::delete($id);
        return redirect(route('admin.news.allNews'));
    }

}
