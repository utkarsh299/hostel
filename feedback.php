<html>
    <!--   html file for sending query using email    -->
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<link href="contact_form_style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div id="wrapper">

<div id="contact_form_div">
 <p id="contact_label">QUERY</p>
 <form method="post" action="email.php">
  <p><input type="text" placeholder="Enter Name" name="name"></p>
  <p><input type="text" placeholder="Enter Email" name="sender"></p>
  <p><input type="text" placeholder="Enter Contact No" name="mobile"></p>
  <p><textarea placeholder="Enter Message" name="txt"></textarea></p>
  <p><input type="submit" value="SUBMIT"></p>
 </form>

<?php if(isset($_REQUEST["sent"])){
	echo "email sent";
}?>
</div>
</div>

</body>
</html>