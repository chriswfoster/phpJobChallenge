<html>
<head>
    <title> Information Gathered</title>
</head>

<body>
<?php

$usersName = $_POST['username']; // this will get me the username data from input.
$streetAddress = $_POST['streetaddress'];
$cityAddress = $_POST['cityaddress'];

echo $usersName . "</br>"; // use double quotes allow you to use escape sequences.
echo $streetAddress . "</br>";
echo $cityAddress . "</br>";


// $str = <<<EOD
// The customers name is
// $usersName and they
// live at $streetAddress
// in $cityAddress. </br>
// EOD;

echo $str;

$numOfOranges = 4;
$numOfBananas = 36;

echo $testData;

if ($numOfOranges > 25 && $numOfBananas > 30){
    echo '25% discount given';
} elseif ($numOfOranges > 30 || $numOfBananas > 35){
    echo '15% discount given';
    } else echo 'no discount given';

// if user buys more than 25 oranges, and more than 30 bananas.

// $randNum = 5;
//  echo $randNum += 10; // shortcut? I think it's just an assignment operator.
//  $randNum2 = 7;
//  echo "++randNum2 = " . ++$randNum2 . "</br>"; // will return 8
//  echo "randNum2++ = " . $randNum2 ++ . "</br>"; // will return 8, because it hasn't added 1 yet.
//  echo $randNum2 .  "</br>"; // gives you 9, from the previous ++ added AFTER the number was returned.
///
//  $refToNum = &$randNum3; // here is a reference to a variable.
//  $randNum3 = 1000;
//  echo '$refToNum = ' . $refToNum . "</br>"; // single quotes b/c we don't want the value showing up
////
//  $randNum3 += 50;
//  $refToNum += 50;
//  echo '$refToNum = ' . $refToNum . "</br>";
//  echo '$randNum3 = ' . $randNum3 . "</br>";


// echo "</br>5 + 2 = " . (5 + 2);
// echo "</br>5 / 2 = " . (integer) (5 / 2); // would normally return 2.5, but we defined it as an int
// echo "</br>5 - 2 = " . (string) (5 - 2); //  return a string

// you can define constants -  that can't be changed, utilzing the 'define' keyword:
// define('PI', 3.1415926); // you want to use uppercase with your constants.
// echo "The value of PI is " . PI;

/*
Data types are:
Int: whole numbers
float: decimal numbers
string: Strings or characters
boolean: true or false
array: Multiple items
object: a object defined by class
*/

//single line comments
/* multiline comment */
# another single line comment type

//echo date('h:i:s:u a, l F jS Y e');
//date_default_timezone_set('UTC');

?>

</body>


</html>

