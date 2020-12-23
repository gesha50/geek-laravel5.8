<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    //
    public function index () {
        return view('info',[
            'newsCategory' => Category::all()
        ]);
    }
}
