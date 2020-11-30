<?php


namespace App\Http\Controllers;

use App\Library\Calc;

class BaseWithCalcController extends Controller
{
    protected $calc;

    public function __construct()
    {
        //реализация калькулятора
        $this->calc = Calc::createCalc();
    }
}
