<?php 
session_start();
if(!isset($_SESSION["office"])){
  header("location: officelogin.php");
}
?>
<!--                        html file to display the options availble when list link is pressed -->
<html><head>


</head>
  <body>
  <p id="txt"></p>
  
  <form action="merit_list.php" method="post">
        <input type="submit" value="merit list" >
		</form>
		<form action="sort.csv" method="get">
        <input type="submit" value="merit list download" >
		</form>

		<form action="roomallotment.php" method="post">
        <input type="submit" value="room allotment" >
		</form>
<form action="roomalloted.csv" method="get">
        <input type="submit" value="room allotment download" >
		</form>
<form action="reference.php" method="get">
        <input type="submit" value="reference" >
		</form>
<form action="reference.csv" method="get">
        <input type="submit" value="reference file download " >
		</form>



		<form action="startwebsite.php" >
		<input type="submit" value="start admission process">
		</form>


		<form action="clear.php" >
		<input type="submit" value="clear admission data">
		</form>
		<br><br><br><br>
		<form action="officelogout.php">
<input type="submit" value="logout">
</form>
		<a href="timer.php">timer trail website</a>
				
</body>
</html>
