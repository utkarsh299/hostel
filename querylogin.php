<!-- login for student to insert query to hostel office -->
<html >
  <head>
   
   
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  
<div class="login-box">
  <form action="querylogincheck.php" method="post">
  <h1>Login</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" name="user" placeholder="Username">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" name="pass" placeholder="Password">
 

 </div>


  <input type="submit" class="btn" value="sign in">
</form>
<?php 
if(isset($_REQUEST["err"])){
  echo "Invalid username or Password";
}
?> 
 </div>

  </body>
</html>

