<html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/CSS/customerSearch.css">
<body class="cSBody">

<p>Search for users:</p>
    <form method="post">
        <table border="0">
            <tr>
                <td class="tableSizing">Search by:</td>
                <td>
                    <select id="clientSelect" name="type" >
                        <option value="name"  selected="selected">Name</option>
                        <option value="id">ID</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td id="clientsname" class="tableSizing">Clients Name:</td>
                <td id="clientsid" class="tableSizing">Client ID:</td>
                
                <td align="center">
                    <input id="clientSearchBox" placeholder="Type Client Name Here" type="text" name="person" size="30" />
                </td>
            </tr>
            <script> 

$("#clientsid").hide()
$("#clientSelect").change(function(e) {
  e.target.value === "name" ? ($("#clientsid").hide() 
  && $("#clientsname").show()
  && $("#clientSearchBox").attr("placeholder", "Type Client Name Here")) 
  : ($("#clientsid").show() 
  && $("#clientsname").hide()
  && $("#clientSearchBox").attr("placeholder", "Type Client ID Here"))
});
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
    idSearch($person, $type, $con);
}

function idSearch($id, $type, $con) {
  
    $sql = "SELECT * FROM monkedia_clients where id = $id";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo $row["firstname"];
        
    }
 }else {
        echo "No such user found!";
    }
    $con -> close();

}

?>
</body>

    </html>