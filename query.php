<?php 
session_start();
if(!isset($_SESSION["studentquery"])){
	header("location: querylogin.php");
}?>


<!--  display file for query insert -->
<html><body>

<a href="dynamic dropbox.php">insert query</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="searchquery.php">applied query</a>&nbsp;&nbsp;&nbsp;&nbsp;

</body></html>