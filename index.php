<html>
<head>
    <link rel="stylesheet" href="./CSS/index.css">
</head>
<body class="indexBody">
    <img class="indexLogo" src="./images/Logo.png">
    <p>MONKEDIA USER LOGIN</p>
    <form method="post">
        <table border="0">
            <tr>
                <td>User Name</td>
                <td align="center">
                    <input type="text" name="user" size="30" />
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td align="center">
                    <input type="text" name="userpassword" size="30" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Submit" />
                </td>
            </tr>
        </table>
    </form>
    <div class="indexUserInfo">
    <p>Username is: chris</p>
    <p>Password is: test</p>
</div>

<div>
    <?php

include 'confidential.php'; // this is a file I'm not pushing to github. It contains credentials to a MariaDB/MySQL server that I host a lot of content on :)
$con=mysqli_connect($servername, $username, $password, $dbname, $port); // these things are from confidential.php

// Check connection
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysql_connect_error();
}
if($_SERVER['REQUEST_METHOD']=='POST'){
$user = $_POST["user"];
$password = $_POST["userpassword"];
    doThis($user, $password, $con);
}

function doThis($user, $password, $con) {   
    $sql = "SELECT * FROM monkedia_users where username = \"$user\"";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        if ($row["password"] !== $password){
            echo "Wrong password!";
        } else {
            $url = "/customerSearch.php/";
            echo "<script> location.replace($url); </script>";
        }
        
    }
 }else {
        echo "No such user found!";
    }
    $con -> close();

}
?>
</div>

</body>

</html>