<html>
<head>
<script>



function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}

function textHandler(e){
    console.log(e)
}
</script>
</head>
<body>

<form>
<input type="text" onchange="textHandler(this.value)"/>
<input type="button"/>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>

</body>
</html>