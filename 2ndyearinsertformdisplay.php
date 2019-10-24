<?php
session_start();
//display username and password when student has successfully registered there entry
echo "
<html><head>
<meta name='viewport' content='width=device-width,initial-scale=1.0'/>
<link href='display.css' type='text/css' rel='stylesheet'/>
</head><body>
<div class='container'>

    <form id='signup'>

        <div class='header'>
        
            <h3>Application Submitted for ID</h3>";

echo $_SESSION['student1']."<br>".$_SESSION["student2"]."<br>".$_SESSION["student3"]."<br>";

echo '</div>
        
        <div class="sep"></div>

        <div class="inputs">';
       
            
 
echo "<strong>username</strong>  ".$_SESSION['student1']."<br><br>";
echo "<strong>password</strong>  ".$_SESSION['pass']."<br><br>";
echo "<a href='index.php'>home page</a>";
            
            
         
        
    echo    ' </div>

    </form>

</div>
</body></html>';
?>