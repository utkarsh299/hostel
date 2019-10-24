<?php 
session_start();

//used for query in hostel room like broken chair etc


if(!isset($_SESSION["studentquery"])){
	header("location: querylogin.php");
}
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Room query </title>
  <script>
  function dynamic(type,query){
	  var type=document.getElementById("type");
	  var query=document.getElementById("query");
	  query.innerHTML="";
	  if(type.value=="carpentry"){
		  var optionarray= ["door repair","cupboard repair","table repair","book shelf repair","other"];
	  }else if(type.value=="electricain"){
		  var optionarray=["one tublight problem","both tubelight problem","fan not working","switch problem"];
	  }else if(type.value=="missing"){
		  var optionarray=["1 chair","2 chair","3 chair","1 table","2 table","3 table","1 bed","2 bed","3 bed"];
	  }
	  for(var option in optionarray){
		  var pair = optionarray[option];
		  var newoption= document.createElement("option");	       
	    newoption.innerHTML=pair;
		query.options.add(newoption);
	  
	  }
  }
  </script>
  </head>
<body><form action="insertquery.php" method="post">
  type of qyery<select name="type" id="type" onchange="dynamic(this.id,query)" required>
  <option></option><option>carpentry</option><option>electricain</option><option>missing</option>
  </select>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  query<select id="query" name="query" required></select>
  <br><br>
  <input type="submit" value="submit">
  </form>
  <br><br><br>
  <form action="querylogout.php"><input type="submit" value="logout"></form>
  <br><br><a href="query.php">go back</a>
  </body>
</html>
