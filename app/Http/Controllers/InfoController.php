<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    //
    public function index () {
        $category = CATEGORY::getCategory();
        return view('info',[
            'newsCategory' => $category
        ]);
    }
}
