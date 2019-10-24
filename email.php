<?php

// send query using email 


$to = "utkarsh2991999@gmail.com";
$sub = $_POST["mobile"];
$name=$_POST["name"];
$subject=$sub." ".$name;
$txt = $_POST["txt"];
$send=$_POST["sender"];
$headers = "From: ".$send;

mail($to,$subject,$txt,$headers);
header("location: feedback.php?sent=1");
?>