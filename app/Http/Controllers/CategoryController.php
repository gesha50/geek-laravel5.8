<?php

namespace App\Http\Controllers;

use App\Library\Calc;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function getCategory() {

        //реализация калькулятора
       // $res = $this->calc->add(5)->sub(1)->getResult();
        ////////////////////////

        $category = CATEGORY::getCategory();
        return view('category',[
            'newsCategory' => $category
        ]);
    }

    public function getOneCategory ($id) {
        $category = CATEGORY::getCategory();

        $news = News::query()->whereHas('category', function ($query) use ($id){
            $query->where('category_id', $id);
        })->get();

        return view('newsOneCategory',[
            'oneCategory' => $news,
            'newsCategory' => $category
        ]);
    }
}
