<html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/CSS/customerSearch.css">
    <title>Client/Customer Search</title>
    <body>
        <header class="navBar">
            <ul>
                <li class="fontWeight"> <a href="/customerSearch.php">Customer Search</a> </li>
                <li class="fontWeight"> <a href="/customerAdd.php">Add Customer</a></li>
            </ul>
        </header>
            <div class="outerDiv">
                <div class="leftDiv">
                    <p>Search for Clients:</p>
                        <form method="post">
                            <div>
                                <p class="leftPanelSizing fontWeight">Search by:</p>
                                <select id="clientSelect" name="type" >
                                    <option value="Firstname" selected="selected">First Name</option>
                                    <option value="Lastname">Last Name</option>
                                    <option value="Email">Email</option>
                                    <option value="ID">ID</option>
                                </select>
                            </div>
                            <div>
                                <p id="clientsfirstname" class="leftPanelSizing fontWeight">Client's First Name:</p>
                                <p id="clientslastname" class="leftPanelSizing fontWeight">Client's Last Name:</p>
                                <p id="clientsid" class="leftPanelSizing fontWeight">Client's ID:</p>
                                <p id="clientsemail" class="leftPanelSizing fontWeight">Client's Email:</p>
                                <p align="center">
                                <input id="clientSearchBox" class="leftPanelSizing" placeholder="Type Client Name Here" type="text" name="person" />
                                </p>
                            </div>         
                            <input type="submit" value="Submit" />
                        </form>
                    </div>
                    <script> 
$("#clientsid, #clientsemail, #clientslastname").hide()
$("#clientSelect").change(function(e) {
  if (e.target.value === "Firstname") {
      $("#clientsid, #clientsemail, #clientslastname").hide() 
  && $("#clientsfirstname").show()
    } else if (e.target.value === "ID"){
   $("#clientsfirstname, #clientsemail, #clientslastname").hide()
  &&  $("#clientsid").show() 
}else if (e.target.value === "Lastname"){
   $("#clientsfirstname, #clientsemail, #clientsid").hide()
  &&  $("#clientslastname").show() 
} else if (e.target.value === "Email"){
   $("#clientsfirstname, #clientsid, #clientslastname").hide()
  &&  $("#clientsemail").show() 
}
$("#clientSearchBox").attr("placeholder", "Type Client " + e.target.value + " Here")
})



</script>
        <div class="innerDiv">
            <?php

include 'confidential.php'; // this is a file I'm not pushing to github. It contains credentials to a MariaDB/MySQL server that I host a lot of content on :)
$con=mysqli_connect($servername, $username, $password, $dbname, $port); // these things are from confidential.php

// Check connection
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysql_connect_error();
}
if($_SERVER['REQUEST_METHOD']=='POST'){
$person = $_POST["person"];
$type = $_POST["type"];

if ($type === "ID"){
    idSearch($person, $con);
} else {
    nameSearch($person, $type, $con);
}
}

function idSearch($id, $con) {
    $sql = "SELECT * FROM monkedia_clients where id = $id";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0){
        echo "<table>
                <tr>
                    <td class='cellSizing fontWeight'>User ID</td>
                    <td class='cellSizing fontWeight'>First Name</td>
                    <td class='cellSizing fontWeight'>Last Name</td>
                    <td class='cellSizing fontWeight'>Email</td>
                    <td class='cellSizing fontWeight'>Registration Date</td>
                </tr>";
    while($row = mysqli_fetch_assoc($result)){
        echo    "<tr>
                    <td class='cellSizing'>" . $row["id"]. "</td>
                    <td class='cellSizing'>" . $row["firstname"]. "</td>
                    <td class='cellSizing'>" . $row["lastname"]. "</td>
                    <td class='cellSizing'>" . $row["email"]. "</td>
                    <td class='cellSizing'>" . $row["reg_date"]. "</td>
                </tr>";
            }
        echo "</table>";
    } else  {
        echo "<div class='noDataFound'>No such client found!</div>";
    }
    $con -> close();
}

function nameSearch($person, $type, $con){
 
    $sql = "SELECT * FROM monkedia_clients where LOWER($type) LIKE LOWER(\"%$person%\")";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0){
        echo    "<table class='tableStyling'>
                    <tr>
                        <td class='cellSizing fontWeight'>User ID</td>
                        <td class='cellSizing fontWeight'>First Name</td>
                        <td class='cellSizing fontWeight'>Last Name</td>
                        <td class='cellSizing fontWeight'>Email</td>
                        <td class='cellSizing fontWeight'>Registration Date</td>
                    </tr>";
        while($row = mysqli_fetch_assoc($result)){
            echo    "<tr>
                        <td class='cellSizing'>" . $row["id"]. "</td>
                        <td class='cellSizing'>" . $row["firstname"]. "</td>
                        <td class='cellSizing'>" . $row["lastname"]. "</td>
                        <td class='cellSizing'>" . $row["email"]. "</td>
                        <td class='cellSizing'>" . $row["reg_date"]. "</td>
                    </tr>";
                }
            echo "</table>";
     }else {
            echo "<div class='noDataFound'>No such client found!</div>";
        }
        $con -> close();
}
?>
            <div>
        </div>
    </body>
</html>