<!DOCTYPE HTML>
<html>
<head>
<style>
  .error {color: #FF0000;}
</style>
 <title>Basic Calculator Selenium Test Demo</title>
</head>
<body>

<?php
require '../Basic/Calculator.php';

$self_url = $_SERVER["PHP_SELF"];
$err1 = $err2 = "";
$a = $b = $result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  // removed use of is_empty, as 0 is considered empty; http://www.php.net/manual/en/function.empty.php
  if (!isset($_POST["a"]) || !is_numeric($_POST["a"])){
    $err1 = "a is required and it should be a number.";
  }
  else{
    $a = $_POST["a"];
  }

  if (!isset($_POST["b"]) || !is_numeric($_POST["b"])){
    $err2 = "b is required and it should be a number.";
  }
  else {
     $b = $_POST["b"];
  }

  if($err1 == "" && $err2 == ""){

    $c = new Basic\Calculator();

    if ($_POST["op"] == '+'){
      $result = $c->add($a, $b);
    }
    else if ($_POST["op"] == '-'){
      $result = $c->sub($a, $b);
    }
  }
}

function filter_inputs($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
?>
<h2>Basic Calculator</h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   a: <input type="text" name="a" value="<?php echo $a;?>">
   <br/>
   <?php if($err1 != ""){ ?>
     <span class="error">* <?php echo $err1;?></span>
   <?php } ?>
   <br/>

   b: <input type="text" name="b" value="<?php echo $b;?>">
   <br/>
   <?php if($err2 != ""){ ?>
     <span class="error">* <?php echo $err2;?></span>
   <?php } ?>
   <br/>
   <!-- != will not handle 0, so using !== for typesafe comparison  -->
   <?php if($result !== ""){ ?>
     <b>Result: <span id="result"><?php echo $result;?></span></b>
   <?php } ?>
   <br/>
   <input id="add" type="submit" name="op" value="+">
   &nbsp; &nbsp;
   <input id="sub" type="submit" name="op" value="-">
</form>
<br/>

</body>
</html>