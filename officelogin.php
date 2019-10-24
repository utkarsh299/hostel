<?php if(isset($_REQUEST["err"])){
  echo "Invalid username or Password";
}
?>
<!-- office login display html file -->
<html >
 <head><title>
     office login
 </title></head>
  <body>
  <form action="officelogincheck.php" method="post">
  <h1>Login</h1>
    <input type="text" name="user" placeholder="Username">
    <input type="password" name="pass" placeholder="Password">
  <input type="submit"  value="sign in">
</form>
  <form action="demo.php" method="post">
    
    	<img src="captcha.php" /><input type="text" name="captcha" />
        <input type="submit" value="submit" />
    </form>
  
  </body>
</html>
