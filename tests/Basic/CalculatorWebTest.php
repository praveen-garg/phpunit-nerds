<?php
/**
 * CalculatorWebTest
 *
 * Copyright (c) 2014, Praveen Garg <praveen.garg@nerdapplabs.com>.
 * All rights reserved.
 */

// define('BASE_URL_FOR_WEB_PAGES', 'http://localhost:8888/phpunit-nerds/src/View/');
// RIGHT - define works OUTSIDE of a class definition.

class CalculatorWebTest extends PHPUnit_Extensions_Selenium2TestCase
{

    // change base url as per yours
    const BASE_URL_FOR_WEB_PAGES = 'http://localhost:8888/phpunit-nerds/src/View/';
    // RIGHT - const works INSIDE of a class definition.

    //fyi, PHPUnit_Extensions_Selenium2TestCase do not save screenshot; INVESTIGATING: is by nature? (finding doc)

    // protected $captureScreenshotOnFailure = TRUE;
    // protected $screenshotPath = '/Applications/MAMP/htdocs/phpunit-nerds/tests/sscreenshots';
    // protected $screenshotUrl = 'http://localhost:8888/phpunit-nerds/tests/screenshots';

    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl(self::BASE_URL_FOR_WEB_PAGES);
    }

    public function testTitle()
    {
        // PHPUnit_Extensions_Selenium2TestCase use url method
        $this->url('Cal.php');

        // PHPUnit_Extensions_SeleniumTestCase use open method
        //$this->open('Cal.php');

        /**
         * so relative url works
         * I guess, you got the idea setBrowserUrl vs url/open ;]
         */

        // PHPUnit_Extensions_Selenium2TestCase => title
        $this->assertEquals('Basic Calculator Selenium Test Demo', $this->title());

        // PHPUnit_Extensions_SeleniumTestCase => assertTitle
        //$this->assertTitle('Basic Calculator Selenium Test');

        // wait, Let me stop mixing things and creating confusion over PHPUnit_Extensions_SeleniumTestCase vs PHPUnit_Extensions_Selenium2TestCase
    }
    // Test for validations
    public function testValidationIfBothFieldsAreEmpty()
    {
        $this->url('Cal.php');
        // $this->clickOnElement('+'); // but we have + and - with same name
        $btn = $this->byId('add');
        //$btn = $this->byId('sub');
        $btn->click();
        // span class = error should have: * a is required and it should be a number.
        //$element = $this->byClassName('error');
        $elements = $this->elements($this->using('css selector')->value('*[class="error"]'));
        $this->assertEquals(2, count($elements));
        $this->assertEquals('* a is required and it should be a number.', $elements[0]->text());
        $this->assertEquals('* b is required and it should be a number.', $elements[1]->text());
    }

    public function testValidationIf_A_IsEmpty()
    {
        $this->url('Cal.php');
        $bInput = $this->byName('b');
        $bInput->value('12');
        $this->assertEquals('12', $bInput->value());

        $btn = $this->byId('add');
        //$btn = $this->byId('sub');
        $btn->click();

        // span class = error should have: * a is required and it should be a number.
        $element = $this->byClassName('error');
        $this->assertEquals('* a is required and it should be a number.', $element->text());
    }

    public function testValidationIf_B_IsEmpty()
    {
        $this->url('Cal.php');

        $aInput = $this->byName('a');
        $aInput->value('12');
        $this->assertEquals('12', $aInput->value());

        $btn = $this->byId('add');
        //$btn = $this->byId('sub');
        $btn->click();

        //span class = error should have: * b is required and it should be a number.
        $element = $this->byClassName('error');
        $this->assertEquals('* b is required and it should be a number.', $element->text());
    }

    // IsNaN -> is not a number
    public function testValidationIf_A_IsNaN()
    {
        $this->url('Cal.php');

        //given
        $aInput = $this->byName('a');
        $aInput->value('t');
        $this->assertEquals('t', $aInput->value());

        $btn = $this->byId('add');
        //$btn = $this->byId('sub');

        //when
        $btn->click();

        //span class = error should have: * b is required and it should be a number.
        $element = $this->byClassName('error');
        //then
        $this->assertEquals('* a is required and it should be a number.', $element->text());
    }

    public function testValidationIf_B_IsNaN()
    {
        $this->url('Cal.php');

        //given
        $aInput = $this->byName('a');
        $aInput->value('12');

        $bInput = $this->byName('b');
        $bInput->value('1t');
        $this->assertEquals('1t', $bInput->value());

        $btn = $this->byId('add');
        //$btn = $this->byId('sub');

        //when
        $btn->click();

        //span class = error should have: * a is required and it should be a number.
        $element = $this->byClassName('error');
        //then
        $this->assertEquals('* b is required and it should be a number.', $element->text());
    }

    // Test for operations
    public function testForAddOperation()
    {
        $this->url('Cal.php');

        $aInput = $this->byName('a');
        $aInput->value('12');

        $bInput = $this->byName('b');
        $bInput->value('12');

        $btn = $this->byId('add');
        $btn->click();

        $element = $this->byId('result');
        $this->assertEquals('24', $element->text());
        // try this next line to see, failure ;]
        // $this->assertEquals('23', $element->text());
    }

    public function testForSubtractOperation()
    {
        $this->url('Cal.php');

        $aInput = $this->byName('a');
        $aInput->value('12');

        $bInput = $this->byName('b');
        $bInput->value('10');

        // $this->clickOnElement('-'); // but we have + and - with same name
        $btn = $this->byId('sub');
        $btn->click();

        $element = $this->byId('result');
        $this->assertEquals('2', $element->text());
        // try this next line to see, failure ;]
        // $this->assertEquals('1', $element->text());

    }
    public function testForZero()
    {
        $this->url('Cal.php');

        $aInput = $this->byName('a');
        $aInput->value('0');

        $bInput = $this->byName('b');
        $bInput->value('0');


        $btn = $this->byId('add');
        $btn->click();

        $element = $this->byId('result');
        $this->assertEquals('0', $element->text());

        $btn = $this->byId('sub');
        $btn->click();

        $element = $this->byId('result');
        $this->assertEquals('0', $element->text());

    }

}
/**
  * on cli use:
  *   phpunit tests/Basic/CalculatorWebTest.php
  */