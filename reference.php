<?php 
 session_start();
 
 
 //print reference file to website
 
 
 
 
if(!isset($_SESSION["office"])){
  header("location: officelogin.php");
}

$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");
$myfile = fopen("reference.csv", "w") or die("Unable to open file!");
$sql = "SELECT * FROM 2ndyearcheck";
$retval=mysqli_query($conn,$sql);  

$txt="sr,student id1,student name1,student id2,student name2,student id3,student name3,username,password,average pointer,room alloted,room1,room2,room3,room4,room5,room6,room7,room8,room9,room10,room11,room12,room13,room14,room15,room16,room17,room18,room19,room20,room21,room22,room23,room24,room25,room26,room27,room28,room29,room30"."\n"; 
file_put_contents("reference.csv",$txt,FILE_APPEND);


while($row = mysqli_fetch_assoc($retval)){
	
	

$txt="${row['sr']}".","."{$row['id1']}".","."{$row['name1']}".","."${row['id2']}".","."{$row['name2']}".","."{$row['id3']}".","."{$row['name3']}".","."${row['username']}".","."{$row['password']}".","."{$row['avg_pointer']}".","."{$row['roomalloted']}".","."${row['room1']}".","."{$row['room2']}".","."${row['room3']}".","."{$row['room4']}".","."${row['room5']}".","."{$row['room6']}".","."${row['room7']}".","."{$row['room8']}".","."${row['room9']}".","."{$row['room10']}".","."${row['room11']}".","."{$row['room12']}".","."${row['room13']}".","."{$row['room14']}".","."${row['room15']}".","."{$row['room16']}".","."${row['room17']}".","."{$row['room18']}".","."{$row['room19']}".","."{$row['room20']}".","."{$row['room21']}".","."{$row['room22']}".","."{$row['room23']}".","."{$row['room24']}".","."{$row['room25']}".","."{$row['room26']}".","."{$row['room27']}".","."{$row['room28']}".","."{$row['room29']}".","."{$row['room30']}"."\n"; 
file_put_contents("reference.csv",$txt,FILE_APPEND);

  }
echo "reference file ready to download";
$conn->close();
?>
<html>

<body>
<form action="officelogout.php">
<input type="submit" value="logout">
</form>

</body></html>