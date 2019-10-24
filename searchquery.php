<?php 
session_start();
if(!isset($_SESSION["studentquery"])){
	header("location: querylogin.php");
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
<!-- html file to display all the queries applied by the student -->
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
	<th>type</th>
	<th>query</th>
	<th>date</th>
</tr>
</thead>
<?php
$i=0;
$result=mysqli_query($conn,"select * from query where roomno='".$_SESSION['room']."'");
while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["query"]; ?>"></td>
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
<form action="querylogout.php"><input type="submit" value="logout"></form>
</body>
</html



?>