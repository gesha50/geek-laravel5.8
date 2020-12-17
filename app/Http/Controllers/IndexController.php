<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;

class IndexController extends Controller
{

    public function index () {
        $category = CATEGORY::getCategory();
        return view('home',[
            'newsCategory' => $category
        ]);
    }

    public function privaci () {
        $category = CATEGORY::getCategory();
        return view('privaci',[
            'newsCategory' => $category
        ]);
    }


}
