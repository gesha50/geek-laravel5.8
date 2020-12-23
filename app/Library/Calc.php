<?php


namespace App\Library;


use App\Library\Interfaces\CalcInterface;

class Calc implements CalcInterface
{

    //реализация калькулятора
    // Calc::add(5)->sub(1)->getResult();
    ////////////////////////

    protected $total;

    public function __construct($total = 0)
    {
        $this->total = $total;
    }

    public static function createCalc ($total = 0) {
        return new self($total);
    }

    public function add (int $amount) {
        $this->total += $amount;
        return $this;
    }

    public function sub (int $amount) {
        $this->total -= $amount;
        return $this;
    }

    public function getResult () {
        return $this->total;
    }
}
