<html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/CSS/customerSearch.css">
<body class="cSBody">

<p>Search for Clients:</p>
    <form method="post">
        <table border="0">
            <tr>
                <td class="cellSizing fontWeight">Search by:</td>
                <td>
                    <select id="clientSelect" name="type" >
                        <option value="Firstname" selected="selected">First Name</option>
                        <option value="Lastname">Last Name</option>
                        <option value="Email">Email</option>
                        <option value="ID">ID</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td id="clientsfirstname" class="cellSizing fontWeight">Client's First Name:</td>
                <td id="clientslastname" class="cellSizing fontWeight">Client's Last Name:</td>
                <td id="clientsid" class="cellSizing fontWeight">Client's ID:</td>
                <td id="clientsemail" class="cellSizing fontWeight">Client's Email:</td>
                
                <td align="center">
                    <input id="clientSearchBox" placeholder="Type Client Name Here" type="text" name="person" size="30" />
                </td>
            </tr>
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
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Submit" />
                </td>
            </tr>
           
        </table>
    </form>


    <?php

include 'confidential.php'; // this is a file I'm not pushing to github. It contains credentials to a MariaDB/MySQL server that I host a lot of content on :)
$con=mysqli_connect($servername, $username, $password, $dbname); // these things are from confidential.php

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
    while($row = mysqli_fetch_assoc($result)){
        echo "<table><tr><td class='cellSizing fontWeight'>User ID</td><td class='cellSizing fontWeight'>First Name</td><td class='cellSizing fontWeight'>Last Name</td><td class='cellSizing fontWeight'>Email</td><td class='cellSizing fontWeight'>Registration Date</td> </tr>";
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["email"]. "</td><td>" . $row["reg_date"]. "</td></tr>";
        echo "</table>";
    }
 }else {
        echo "No such user found!";
    }
    $con -> close();
}

function nameSearch($person, $type, $con){
 
    $sql = "SELECT * FROM monkedia_clients where LOWER($type) LIKE LOWER(\"%$person%\")";
    $result = mysqli_query($con, $sql);
    echo "<table class='tableStyling'><tr><td class='cellSizing fontWeight'>User ID</td><td class='cellSizing fontWeight'>First Name</td><td class='cellSizing fontWeight'>Last Name</td><td class='cellSizing fontWeight'>Email</td><td class='cellSizing fontWeight'>Registration Date</td> </tr>";
    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr><td class='cellSizing'>" . $row["id"]. "</td><td class='cellSizing'>" . $row["firstname"]. "</td><td class='cellSizing'>" . $row["lastname"]. "</td><td class='cellSizing'>" . $row["email"]. "</td><td class='cellSizing'>" . $row["reg_date"]. "</td></tr>";
        }
     }else {
            echo "No such client found!";
        }
        $con -> close();
        echo "</table>";
}

?>
</body>

    </html>