<?php


namespace App\Library;


class Calc
{
    protected $total;

    public function __construct($total = 0)
    {
        $this->total = $total;
    }

    public static function createCalc ($total = 0) {
        return new self($total);
    }

    public function add ($amount) {
        $this->total += $amount;
        return $this;
    }

    public function sub ($amount) {
        $this->total -= $amount;
        return $this;
    }

    public function getResult () {
        return $this->total;
    }
}
