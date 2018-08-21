<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Http\Controllers\CalculatorController as Calculator;

class CalculatorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCase1()
    {
        $calMock = new Calculator;
        $result = $calMock->calculateChange(1);

        $expect = array("1 Dollar" => 1 );

        $this->assertEquals($expect,$result);
    }

    public function testCase2()
    {
        $calMock = new Calculator;
        $result = $calMock->calculateChange(0.99);

        $expect = array("Quarters" => 3,
                        "Dimes" => 2,
                        "Pennies" => 4);

        $this->assertEquals($expect,$result);
    }

    public function testCase3()
    {
        $calMock = new Calculator;
        $result = $calMock->calculateChange(124.67);

        $expect = array("100 Dollar" => 1 ,
                        "20 Dollar" => 1,
                        "1 Dollar" => 4,
                        "Quarters" => 2,
                        "Dimes" => 1,
                        "Nickels" => 1,
                        "Pennies" => 2);

        $this->assertEquals($expect,$result);
    }
}
