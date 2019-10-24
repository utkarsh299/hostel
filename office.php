<?php 
session_start();
if(!isset($_SESSION["office"])){
	
	header("location: officelogin.php");
}

?>

 <!--                                   html file for display of office                                 -->


<html>
<head> <script>

        function fun(){    
count=2;
  console.log(count);
document.getElementById("input").disabled=true;
            id=document.getElementById("stud").value;
            xmlhttp = new XMLHttpRequest();
       
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
		if(this.responseText==""){}else{count--;
		    console.log(count);
		}
		
if(count==1){
    document.getElementById("input").disabled=false;}
else{document.getElementById("input").disabled=true;}
				}
        };
        xmlhttp.open("GET","2ndyearinsertformcheck.php?q="+id,true);
        xmlhttp.send();
        }

   

    </script></head>

<body>
<a href="office_list.php" >list</a>
<a href="office_check.php" >check</a>
<a href="room.php" >room</a><br><br>
<form action="link.php" method="post">
<input type="submit" value="start intake" name="apply" >
<br>
<input type="submit" value="start room preference form" name="login">
<br></form><br>
<form action="officelogout.php">
<input type="submit" value="logout">
</form><br>
<form action="officequery.php">
<input type="submit" value="student query">
</form>
<form action="insert.php" method="post">
    id:<input type="number" min="99999999" onkeyup="fun()" id="stud" name="id"><br>
    name:<input type="text" name="name"><br>
        pointer:<input type="number" step="0.01" name="pointer"><br>
<input type="submit" value="insert" id="input">
</form><br><br><p id="txtHint"></p>
</body></html>
