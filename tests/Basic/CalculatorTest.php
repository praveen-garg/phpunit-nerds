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
// require path_to_'Basic/Calculator.php';
// OR
// use Basic\Calculator as Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Calculator::__construct
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidConstructorArguments()
    {
        // Stop here and mark this test as incomplete.
        $this->markTestIncomplete('This test has not been implemented yet.');
        //$this->markTestSkipped('Exception should be raised for invalid arguments.');
        //new Calculator(1);
    }
    /*
      You shouldn't test situations (testExceptionIsRaisedForInvalidConstructorArguments), as above test does.
      A purpose of a unit test is to make sure that a class under test performs according to its "contract",
      which is its public interface (functions and properties). What you're trying to do is to break the contract. I think, It's out of scope of a unit test,
    */

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
        $this->assertEquals(0, $c->add(0, 0));
        $this->assertEquals(-1, $c->add(0, -1));
    }

    /**
     * @covers Calculator::sub
     * @depends testObjectCanBeConstructedForValidConstructorArguments
     */
    public function testSub(Calculator $c)
    {
        $this->assertEquals(5, $c->sub(10, 5));
        $this->assertEquals(0, $c->sub(0, 0));
        $this->assertEquals(1, $c->sub(0, -1));
    }
}

/**
  * on cli use:
  *   phpunit --colors tests/Basic/CalculatorTest.php
  * in phpunit.xml, bootstrap="./vendor/autoload.php" attribute specifies where the bootstrap file is located
  */