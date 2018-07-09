<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="/CSS/customerAdd.css">
<title>Add Client to DB</title>
<body>
<header class="navBar">
            <ul>
                <li class="fontWeight"> <a href="/customerSearch.php">Customer Search</a> </li>
                <li class="fontWeight"> <a href="/customerAdd.php">Add Customer</a></li>
            </ul>
        </header>
 <p class="title">Add Client to the database. NO duplicate emails!</p>
<form method="post">
    <table><tr>
<td><p>Enter Client's First Name:</p></td>
<td><input placeholder="Type First Name Here" name="addFirstName" type="text"/></td>
</tr>
<tr>
    <td><p>Enter Client's Last Name:</p></td>
    <td><input placeholder="Type Last Name Here" name="addLastName" type="text"/></td>
</tr>
<tr>
    <td><p>Enter Client's Email:</p></td>
<td><input placeholder="Type Email Here" name="addEmail" type="text"/></td>
</tr>
</table>
<input type="submit" value="Submit" />
</form>
 <?php

include 'confidential.php'; // this is a file I'm not pushing to github. It contains credentials to a MariaDB/MySQL server that I host a lot of content on :)
$con=mysqli_connect($servername, $username, $password, $dbname, $port); // these $variables are from confidential.php

// Check connection
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysql_connect_error();
}
if($_SERVER['REQUEST_METHOD']=='POST'){
$firstName = $_POST["addFirstName"];
$lastName = $_POST["addLastName"];
$email = $_POST["addEmail"];

addClient($firstName, $lastName, $email, $con);
}

function addClient($firstname, $lastname, $email, $con) {
    $sql = "INSERT INTO monkedia_clients (firstname, lastname, email, reg_date) VALUES (\"$firstname\", \"$lastname\", \"$email\", NOW())";

    if ($con->query($sql) == '1') {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "</br>" . $con->error. "</br>";
    }

    $con -> close();
}

?>
</body>

</html>