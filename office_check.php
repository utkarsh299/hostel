<?php 
session_start();
if(!isset($_SESSION["office"])){
  header("location: officelogin.php");
}
?>
<!--                              html file to display the username and password of student when student forgot there usename or password -->
<html>
<head>
<script>
function myFunction() {
room=document.getElementById("t1").value;
  document.getElementById("t2").disabled=true;
	    xmlhttp = new XMLHttpRequest();
       
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("text1").innerHTML = this.responseText;
				if(this.responseText!="not applied"){
					document.getElementById("t2").disabled=false;
				}
            }
        };
    xmlhttp.open("GET","checkapplied.php?count="+room,true);
        xmlhttp.send();
  
}</script>
</head>
  <body>
  
  <form action="check.php" method="post">
        id:<input type="number" id="t1" name="time" onkeyup="myFunction()" required>
		<input type="submit"  id="t2" value="delete">
		</form>
<p id="text1"> </p> 
</body>
</html>
