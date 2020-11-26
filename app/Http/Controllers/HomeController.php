<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;

class HomeController extends Controller
{

    public function index () {
        $category = CATEGORY::getCategory();
        return view('home',[
            'newsCategory' => $category
        ]);
    }
}
