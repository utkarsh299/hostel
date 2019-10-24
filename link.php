<?php  
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");
if($conn->connect_error){  
  die('Could not connect: '.$conn->connect_error);  
}

//enable and disable link using database

if(isset($_POST["apply"])){

	$stmt=$conn->prepare("update link set apply=1");
		$stmt->execute();
    echo "apply form started";
}
		
if(isset($_POST["login"])){
	$stmt=$conn->prepare("update link set login=1");
		$stmt->execute();
    echo "login form started";
}
		

?>