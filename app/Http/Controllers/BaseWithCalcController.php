<?php


namespace App\Http\Controllers;

use SuperCalc;
use App\Library\Interfaces\CalcInterface;

class BaseWithCalcController extends Controller
{

    public function index () {

        $calc = app(CalcInterface::class);
        $calc2 = app(CalcInterface::class);
        $calc3 = SuperCalc::add(5);

        dump($calc);
        dump($calc3);
        dd($calc2);
    }
}
