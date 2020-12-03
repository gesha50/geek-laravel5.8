<?php

namespace App\Http\Controllers;

use App\Library\Calc;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends BaseWithCalcController
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
        $oneCategory = CATEGORY::getOneCategory($id);
        return view('newsOneCategory',[
            'oneCategory' => $oneCategory,
            'newsCategory' => $category
        ]);
    }
}
