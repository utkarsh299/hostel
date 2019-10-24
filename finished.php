<?php 
session_start();
// logout for student login form
unset($_SESSION["allotstudent"]);
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Room submitted </title>
  <link rel="stylesheet" href="room.css">
  </head>
<body>
  <h1 class="register-title">Response submitted</h1>
  <form class="register">
  <strong class="register-input">
    you can edit form again by login but your earlier submission will get <del>deleted</del > edited</strong><br><br>
    <a href="index.php">home page</a>
  </form>
</body>
</html>
