<?php
/**
 * Calculator
 *
 * Copyright (c) 2014, Praveen Garg <praveen.garg@nerdapplabs.com>.
 * All rights reserved.
 */

namespace Basic;

Class Calculator
{
  // protected $a = 0;
  // protected $b = 0;

  public function __construct()
  {
  	// $this->a = 10;
  	// $this->b = 5;
  }

  // you may want to ignore __construct stuff below, I was trying a way to use and understand multiple constructors
  /*
  function __construct()
  {
    $args = func_get_args();
    $numberOfargs = func_num_args();
    if($numberOfargs == 0) {
      $this->a = 10;
      $this->b = 5;
    }
    else if ( method_exists($this,$fx='__construct'.$numberOfargs)) {
      call_user_func_array(array($this,$fx),$args);
    }
  }

  function __construct1($arg1)
  {
    $this->a = $arg1;
    $this->b = 5;
    echo('__construct with 1 param called: '.$arg1.PHP_EOL);
  }

  function __construct2($arg1,$arg2)
  {
    $this->a = $arg1;
    $this->b = $arg2;
    echo('__construct with 2 params called: '.$arg1.','.$arg2.PHP_EOL);
  }

  */

  public function add($a, $b)
  {
  	return $a + $b;
  }

  public function sub($a, $b)
  {
  	return $a - $b;
  }

} // End of Class Calculator

  /*
   $o = new Calculator('1');
   $o = new Calculator('1','2');
   */

  // Output

  // __construct with 1 param called: 1
  // __construct with 2 params called: 1,2

// End of file Calculator.php