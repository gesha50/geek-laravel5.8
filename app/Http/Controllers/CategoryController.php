<?php

namespace App\Http\Controllers;

use App\Library\Calc;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //реализация калькулятора
    protected $calc;

    public function __construct()
    {
        //реализация калькулятора
        $this->calc = Calc::createCalc();
    }

    public function getCategory() {
        //реализация калькулятора
        $res = $this->calc->add(5)->sub(1)->getResult();
//        dd($res);
        $category = CATEGORY::getCategory();
        return view('category',[
            'newsCategory' => $category
        ]);
    }

    public function getOneCategory ($id) {
        $obj = new News();
        $category = CATEGORY::getCategory();
        $allNews = $obj->getNews();
        $oneCategory = [];
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
