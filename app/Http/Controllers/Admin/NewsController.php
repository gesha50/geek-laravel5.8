<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            Storage::disk('public')->putFile('', $request->file('image'));
            News::addNews($request->only('title', 'description', 'isPrivate', 'categories'));
//            $request->flash();
            return redirect(route('admin.news.allNews'));
        } else {
            return view('admin.add',[
                'newsCategory' => CATEGORY::getCategory(),
                'isAdmin' => true
            ]);
        }
    }

    public function delete ($id) {
        News::delete($id);
        return redirect(route('admin.news.allNews'));
    }

}
