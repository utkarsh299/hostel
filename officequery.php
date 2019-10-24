<?php 
session_start();


//html file to display the query of room available  when room is alloted to students  




if(!isset($_SESSION["office"])){
  header("location: officelogin.php");
}
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");    
if($conn->connect_error){  
  die('Could not connect: '.$conn->connect_error);  
}  
if (isset($_POST['save'])){
	$checkbox=$_POST['check'];
for($i=0;$i<count($checkbox);$i++){
	$del_id=$checkbox[$i];
	mysqli_query($conn,"delete from query where query='".$del_id."'");
}
	}


?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>Delete employee data</title>
</head>
<body>

<form method="post" action="">
<table class="table table-bordered">
<thead>
<tr>
    <th></th>
    <th>roomno</th>
	<th>type</th>
	<th>query</th>
	<th>date</th>
</tr>
</thead>
<?php
$i=0;
$result=mysqli_query($conn,"select * from query order by date");
while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["query"]; ?>"></td>
	<td><?php echo $row["roomno"]; ?></td>
	<td><?php echo $row["type"]; ?></td>
	<td><?php echo $row["query"]; ?></td>
	<td><?php echo $row["date"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
<p align="center"><button type="submit" class="btn btn-success" name="save">DELETE</button></p>
</form>
<br><br><br>
<form action="officelogout.php"><input type="submit" value="logout"></form>
</body>
</html



?>