<?php 
session_start();
if(!isset($_SESSION["office"])){
  header("location: officelogin.php");
}

$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");
$room=$_POST["room"];
if(isset($_POST["insert"])){
//insert the given room in allotment process
$stmt=$conn->prepare("insert into room(roomno) values(?)");
$stmt->bind_param("s",$room);
		$stmt->execute();
		$re=$stmt->get_result();

echo "room: ".$room." inserted";
}
if(isset($_POST["delete"])){
//delete the given room from allotment process
$stmt=$conn->prepare("delete from room where roomno=?");
$stmt->bind_param("s",$room);
		$stmt->execute();
		$re=$stmt->get_result();

echo "room: ".$room." deleted";
}

?>
<html>

<body>
<form action="officelogout.php">
<input type="submit" value="logout">
</form>

</body></html>