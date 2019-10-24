<!doctype html>



<!--          first login page when website is opened -->
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       <link rel="stylesheet" type="text/css" href="style1.css">
    <title>VJTI Hostel </title>
    
  </head>
  <body>
      <div class="row backgroundimg">
    <div class="container-fluid">
        <h3 align="center">
<font face="Lato"  size="6">LINK ON THE RIGHT</font>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font face="cinzel"  size="4">
    <?php
    
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");
if($conn->connect_error){  
  die('Could not connect: '.$conn->connect_error);  
} 
$txt="select apply from link";
$stmt=mysqli_query($conn,$txt);
$row=mysqli_fetch_assoc($stmt);
$num=$row["apply"];
if($num==1){
echo '<a href="2ndyearinsertform1.php" class="apply">APPLY</a>&nbsp;&nbsp;';


}

$txt="select login from link";
$stmt=mysqli_query($conn,$txt);
$row=mysqli_fetch_assoc($stmt);
$num=$row["login"];

if($num==1){
echo '<a href="login1.php" class="login">ADMISSION LOGIN</a>&nbsp;&nbsp;';
}

$txt="select merit from file";
$stmt=mysqli_query($conn,$txt);
$row=mysqli_fetch_assoc($stmt);
$num=$row["merit"];
if($num==1){
    echo '<a href="sort.csv"> MERIT LIST</a>&nbsp;&nbsp;';
}

$txt="select room from file";
$stmt=mysqli_query($conn,$txt);
$row=mysqli_fetch_assoc($stmt);
$num=$row["room"];
if($num==1){
    echo '<a href="roomalloted.csv">ROOM ALLOTED LIST</a>&nbsp;&nbsp;';
}

?>
<a href="feedback.php">query</a>&nbsp;&nbsp;
<a href="querylogin.php">student login</a>&nbsp;&nbsp;
</font>
</h3>
<br /><br /><br /><br /><br /><br /><br /><br /><br />
<h1 align="center">
<font face="Lato" color="#017bf5" size="7">
VJTI HOSTEL
</font>
</h1>

<br /><br /><br /><br /><br /><br /><br />


        
<div class="row">
    <div class="col-sm-2 offset-sm-8"><strong>for any query<br>whatsapp on: 9130686964</strong></div>
</div>
<br><br><br><a href="officelogin.php">office login</a>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>