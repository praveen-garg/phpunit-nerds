<?php
/**
 * CalculatorTest
 *
 * Copyright (c) 2014, Praveen Garg <praveen.garg@nerdapplabs.com>.
 * All rights reserved.
 */

namespace Basic;

// autoloading-classes-in-phpunit
// http://stackoverflow.com/questions/15710410/autoloading-classes-in-phpunit-using-composer-and-autoload-php

// No need of require or use, as we are autoloading; see composer.json for autoload stuff :)
// require 'Calculator.php';
// OR
// use Basic\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Calculator::__construct
     * @expectedException Calculator\InvalidArgumentException
     */

    /*public function testExceptionIsRaisedForInvalidConstructorArguments()
    {
        // $this->markTestSkipped('Exception is raised for invalid constructor arguments.');
        new Calculator(1);
    }*/

    /**
	 * @covers Calculator::__construct
     */
    public function testObjectCanBeConstructedForValidConstructorArguments()
    {
        $c = new Calculator();
        $this->assertInstanceOf('Basic\Calculator', $c);
        return $c;
    }

    /**
	 * @covers Calculator::add
	 * @depends testObjectCanBeConstructedForValidConstructorArguments
	 */
    public function testAdd(Calculator $c)
    {
        $this->assertEquals(15, $c->add(10, 5));
    }

    /**
     * @covers Calculator::sub
     * @depends testObjectCanBeConstructedForValidConstructorArguments
     */
    public function testSub(Calculator $c)
    {
        $this->assertEquals(5, $c->sub(10, 5));
    }
}

/**
  * on cli use:
  *   phpunit --colors tests/Basic/CalculatorTest.php
  * in phpunit.xml, bootstrap="./vendor/autoload.php" attribute specifies where the bootstrap file is located
  */