<?php 
//check for login
session_start();
if(!isset($_SESSION["allotstudent"])){
  header("location: index.php");
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<script>
count=0;
function test() {
    <?php 
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");  
//display preference when logged in
$user=$_SESSION['user'];
$pass=$_SESSION['pass'];

$temp=1;
$stmt=$conn->prepare("select * from 2ndyearcheck where username=? and password=?");
$stmt->bind_param("is",$user,$pass);

		$stmt->execute();
		$retval=$stmt->get_result();
			
		 $row=mysqli_fetch_assoc($retval);
		 $txt="room$temp";
		 $check=$row["$txt"];
		while(!empty($check)){
		   $temp++;
		   $txt="room$temp";
		$check=$row["$txt"];
		    
		}
		$temp-=1;
	echo "count=".$temp.";";
$conn->close();
?>
xmlhttp = new XMLHttpRequest();
       
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
                
				
            }
        };
//	var temp=document.getElementById("t1").value;
		xmlhttp.open("GET","roomloginload.php?count="+count,true);
        xmlhttp.send();

}

function myFunction() {
    //insert preference using ajax
    count++;
room=document.getElementById("t1").value;
	 console.log(count);
    xmlhttp = new XMLHttpRequest();
       
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
var param= "stri="+room+"&count="+count;
	var url= "2ndyear.php";
		xmlhttp.open("GET",url+"?"+param,true);
        xmlhttp.send();
  
  if(count>=30)document.getElementById("insert").disabled=true;
  if(count>=1)document.getElementById("delete").disabled=false;
}
function myFunction1() {
    //delete preference using ajax
  xmlhttp = new XMLHttpRequest();
     
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
					count--;
console.log(count);				
            }
        };
		
		var temp=document.getElementById("t1").value;
var param= "count="+count;
	var url= "2ndyeardelete.php";
		xmlhttp.open("GET",url+"?"+param,true);
        xmlhttp.send();
		
if(count<=30){document.getElementById("insert").disabled=false;}

if(count<=1){document.getElementById("delete").disabled=true;}
 
}
</script>
	</head>
  <body onload="test()" >
<marquee behavior="slide"><?php $conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");
$txt="select sr from sort where username='".$_SESSION['user']."'";
$r=mysqli_query($conn,$txt);
try{
$row=mysqli_fetch_assoc($r);}
catch(Exception $e){
echo "merit list not yet made";
}
echo "your merit number is ".$row['sr']."&nbsp;&nbsp;&nbsp;"."so fill atleast ".$row['sr']." rooms";
?></marquee>



  <div class="container">
<br><br>

ROOM:&nbsp;&nbsp;<select id="t1" name="room">
<?php 
//insert the available rooms from databasae
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");
if($conn->connect_error){  
  die('Could not connect: '.$conn->connect_error);  
}
$txt="select roomno from room";
$stmt=mysqli_query($conn,$txt);
while($row=mysqli_fetch_assoc($stmt)){
    
    echo "<option>".$row["roomno"]."</option>";
}



?>
</select>
<br><br>
<input type="button" id="insert" onclick="myFunction()" value="insert">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type="button" id="delete" onclick="myFunction1()" value="delete">

<br><br><form action="finished.php">
<input type="submit"  value="submit">
</form>

<div class="row">
<div class="col-sm-3 offset-sm-6"><p id="txtHint"></p>
</div>
<div class="col-sm-3 offset-sm-6"><p id="txtHint1"></p>
</div>
</div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>