<?php 
session_start();

//clear data of website when pressed clear button


if(!isset($_SESSION["office"])){
  header("location: officelogin.php"); 
}

$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");
$txt="drop table 2ndyearcheck";
mysqli_query($conn,$txt);
$txt="drop table 2ndyearapplicable";
mysqli_query($conn,$txt);
$txt="drop table applied";
mysqli_query($conn,$txt);
$txt="drop table sort";
mysqli_query($conn,$txt);
$txt="drop table student";
mysqli_query($conn,$txt);
$txt="drop table room ";
mysqli_query($conn,$txt);
echo "data cleared";
?>