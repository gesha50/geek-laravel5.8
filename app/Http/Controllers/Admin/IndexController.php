<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    public function index () {
        return view('admin.index',[
            'newsCategory' => CATEGORY::getCategory(),
            'isAdmin' => true
        ]);
    }
}
