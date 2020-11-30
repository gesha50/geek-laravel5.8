<?php

namespace Tests\Unit;

use App\Library\Calc;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function isCalcCorrect () {
        $integer = 8;
        $calc = Calc::createCalc($integer);
        $this->assertInstanceOf(Calc::class, $calc);
        $this->assertEquals($integer, $calc->getResult());
    }
}
