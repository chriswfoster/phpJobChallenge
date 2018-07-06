<html>
<head>
    <title> Information Gathered</title>
</head>

<body>
<?php
// include 'confidential.php'; // how to import 1 php file data into another


$usersName = $_POST['username']; // this will get me the username data from input.
$streetAddress = $_POST['streetaddress'];
$cityAddress = $_POST['cityaddress'];

echo $usersName . "</br>"; // use double quotes allow you to use escape sequences.
echo $streetAddress . "</br>";
echo $cityAddress . "</br>";


////////////////////////////FUNCTIONS

function addNumbers ($num1, $num2){ // params still use $.
    return $num1 + $num2;
}

echo "3 + 4 = " . addNumbers(3, 4)




//////////////////////////// STRINGS:
/*
$randString = "             Random String     ";
$noSpaceString = "Random String";
$partOfString= substr($noSpaceString, 0 ,6) . "</br>"; //same as javascripts substring
echo $partOfString;

echo strlen("$randString") . "<br/>";
echo strlen(ltrim("$randString")) . "<br />"; // trims left side of string using ltrim
echo strlen(trim($randString)) . "<br />"; //trims all of string, when no l or r is defined

echo "The randomString is $randString </br>";
printf ("The randomString is %s </br>", $randString); // takes 2nd parameter and passes it in. Use %s to tell it to grab the string.
echo strtoupper($randString) . '</br>'; // uppercase the entire string
echo strtolower($randString) . '</br>';// lowercase the string
echo ucfirst($randString) . '</br>'; // upper case first letter of string words

$arrayForSTring = explode(' ', $randString, 2); //breaks string up, and puts it into an array.
$stringToArray = implode(' ', $arrayForSTring ); //breaks array down into a string

//$decimalNum = 2.3456;
//printf("decimal num = %.2f </br>"); //using printf with conversion code to shrink decimal down.

//other conversion codes:
//    b: integer to binary
//    c: integer to character
//    d: integer to decimal
//    f: double to float
//    o: integer to octal
//    s: string to string

$man = "Man";
$manhole = "Manhole";
//echo strcmp($man, $manhole); // compares 2 strings. returns a number. 
                                //returns -4 b/c 1st param is smaller than 2nd param.
//echo strcasecmp($man, $manhole); // compares strings, but ignores case sensitivity.

echo "Prints out part of string when it finds the world in strstr: " . strstr($manhole, "hole");
// stristr() is case insensitive. 
echo "</br>";
echo "Index of the word hole: " . strpos($manhole, "hole");
echo "</br>";
echo "Replace part of string: " . str_replace("hole", "cover", $manhole);
*/


//////////////////////////// Common array functions:
/*
$yourArray = array('tom', 'larry', 'chuck', 'steve');
//sort($yourArray); // sorts in ascending alphabetical order
//sort($yourArray, SORT_NUMERIC); // will sort numerically 
//sort($yourArray, SORT_STRING); // sorts strings
//asort($yourArray); // sorts array with keys
//ksort($yourArray); //sorts by keys
rsort($yourArray); //add the letter 'r' to the beginning of any sort function, and it reverses it.
foreach($yourArray as $person){
    echo $person;
}
*/

//////////////////////////// MultiDimensional Array
/*
$customers = array(array('Derek', '123 Main', '15212'), array('Sally', '125 Main', '15212'), array('Tom', '124 Main', '15212'));
foreach($customers as $row){
    foreach ($row as $columns){
        echo $columns;
    }
}
*/

//////////////////////////// ARRAYS
/*
$bestFriends = array('Joy', 'Willow', 'Ivy');
$bestFriends[3] = 'Mike';
for ($num =0; $num < count($bestFriends); $num++){
    echo $bestFriends[$num] . ', ' . "<br />";
} 
// can also do a foreach to map through it. This is just for arrays.
foreach($bestFriends as $friend){
    echo $friend . ', ';
}
echo "<br />";
// key valued pairs for arrays:
$customer = array('Name' => $usersName, 'Street' => $streetAddress, 'City' => $cityAddress);
foreach($customer as $key => $value){
    echo $key . ' : ' . $value . "<br />";
}
$bestFriends = $bestFriends + $customer;
// echo $bestFriends;
foreach($bestFriends as $person){
    echo $person . ', ';
}
*/

//////////////////////////// FOR LOOP
/*
for ($num = 1; $num <= 20; $num++){
    echo $num;

    if($num != 20){
        echo ', ';
    } else {
        break; // breaks the for loop, could use exit() here as well, but that will stop your PHP script all together.
    }
}
*/

//////////////////////////// WHILE LOOP
/*
$num = 0;
 while ($num < 20){
echo ++$num . ', '; // if i put ++ after $num, it'd return 0, then add the numbers, I won't get num till the next go around.
 }
*/
////////////////////////////SWITCH STATEMENT
// switch ($usersName){
// case "Chris" :
//     echo "Hello Chris";
//     break;
// case "Sally" :
// echo "Hello Sally";
// break;
// default :
// echo "Hello unknown person";
// }
//////


/////////////////////////
// $numOfOranges = 4;
// $numOfBananas = 36;
// if ($numOfOranges > 25 && $numOfBananas > 30){
//     echo '25% discount given';
// } elseif ($numOfOranges > 30 || $numOfBananas > 35){
//     echo '15% discount given';
//     } else echo 'no discount given';
//////////////////////////


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

////////////////////////// heredoc string
/* 
$str = <<<EOD
 The customers name is
 $usersName and they
 live at $streetAddress
 in $cityAddress. </br>
EOD; // <- needs to have no space in front of it.
 echo $str;
 */
//////////////////////////


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

