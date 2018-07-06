<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<body>

<p>Search for users:</p>
    <form method="post">
        <table border="0">
            <tr>
                <td>Search by:</td>
                <td>
                    <select name="selected">
                        <option value="name">Name</option>
                        <option value="id">ID</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td id="clientsname">Clients Name:</td>
                <td id="clientsid">Client ID:</td>
                
                <td align="center">
                    <input placeholder="Type Client Name" type="text" name="user" size="30" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Submit" />
                </td>
            </tr>
           
        </table>
    </form>

<script> 
$("#clientsid").hide()
$("button").click(function(){
    $("#clientsname").toggle()
    $("#clientsid").toggle()
});
</script>
    <?php


?>
</body>

    </html>