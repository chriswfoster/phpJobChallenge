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
                    <select id="clientSelect" name="selected">
                        <option value="name">Name</option>
                        <option value="id">ID</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td id="clientsname" class="tableSizing">Clients Name:</td>
                <td id="clientsid" class="tableSizing">Client ID:</td>
                
                <td align="center">
                    <input id="clientSearchBox" placeholder="Type Client Name Here" type="text" name="user" size="30" />
                </td>
            </tr>
            <script> 
// 
// $("button").click(function(){
//     $("#clientsname").toggle()
//     $("#clientsid").toggle()
// });
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


?>
</body>

    </html>