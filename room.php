<?php 
session_start();
if(!isset($_SESSION["office"])){
  header("location: officelogin.php");
}
?>


<!-- check whether room is available for allotment if yes then can be removed if no then can be added to hostel allotment -->


<html>
<head>
<script>
function myFunction() {
room=document.getElementById("t1").value;
  document.getElementById("t2").disabled=true;
  document.getElementById("t3").disabled=true;
    xmlhttp = new XMLHttpRequest();
       
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("text1").innerHTML = this.responseText;
				if(this.responseText=="present"){document.getElementById("t3").disabled=false;}
				else{document.getElementById("t2").disabled=false;}
  
            }
        };
    xmlhttp.open("GET","roomcheck.php?count="+room,true);
        xmlhttp.send();
  
}</script>
</head>
  <body>
  
  <form action="roominsert.php" method="post">
        room:<input type="text" id="t1" name="room" maxlength="4"  onkeyup="myFunction()" required>
		<input type="submit"  id="t2" value="insert" name="insert">
		<input type="submit"  id="t3" value="delete" name="delete">
		</form>
<p id="text1"> </p> 

<form action="officelogout.php">
<input type="submit" value="logout">
</form>
</body>
</html>

