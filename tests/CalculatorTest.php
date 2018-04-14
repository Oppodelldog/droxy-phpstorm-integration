<?php

namespace DroxyDemo\Tests;

use DroxyDemo\Calculator;
use \PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $a = 10;
        $b = 32;

        $result = Calculator::add($a, $b);
        $expectedResult = $a + $b;

        self::assertSame($expectedResult, $result);
    }
}
