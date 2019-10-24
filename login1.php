<!--html file for login  -->
<html >
  <head>
   
<style>
    a {
        color: white;
    }
    
</style>   
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  
<div class="login-box">
  <form action="login.php" method="post">
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
<a href="index.php" >main page</a>
  
  </div>

  </body>
</html>
