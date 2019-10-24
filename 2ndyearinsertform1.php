
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<link href="apply.css" type="text/css" rel="stylesheet"/>
<script>
function test(){
	
	//truncate all values when website get loaded
	 document.getElementById("t1").value="";
	 document.getElementById("t2").value="";
	 document.getElementById("t3").value="";
	
 }
 count=0;
student1=1;
student2=2;
student3=3;
function showUser() {
    //insert function used to enable and disable submit button
document.getElementById("con").disabled=true; 
 str =document.getElementById("t1").value;
       student1=str;

 
            xmlhttp = new XMLHttpRequest();
       
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
		if(this.responseText==""){count++;}
		
if(count==3){student();
}else{document.getElementById("con").disabled=true;}

				}
        };
        xmlhttp.open("GET","2ndyearinsertformcheck.php?q="+str,true);
        xmlhttp.send();
    
}
function showUser1() {
    //insert function used to enable and disable submit button
    str =document.getElementById("t2").value;
       student2=str;

            xmlhttp = new XMLHttpRequest();
       
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint1").innerHTML = this.responseText;
		if(this.responseText==""){count++;}
		
		if(count==3){student();
		}else{document.getElementById("con").disabled=true;}
		}
        };
        xmlhttp.open("GET","2ndyearinsertformcheck.php?q="+str,true);
        xmlhttp.send();
    
}
function showUser2() {
    //insert function used to enable and disable submit button
    str =document.getElementById("t3").value;
       
 student3=str;
 
 xmlhttp = new XMLHttpRequest();
       
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint2").innerHTML = this.responseText;
				if(this.responseText==""){count++;}
			
if(count==3){student();
	
	}else{document.getElementById("con").disabled=true;}    
		
            }
        };
        xmlhttp.open("GET","2ndyearinsertformcheck.php?q="+str,true);
        xmlhttp.send();
}
function student(){
    //check whether student id is already registered in database or id is repeated
    count--;
	if(student1==student2){ 
	console.log("same userid");
	document.getElementById("txtHint5").innerHTML ="repeated id ";
	document.getElementById("con").disabled=true;
}else if(student3==student2){
	document.getElementById("txtHint5").innerHTML ="repeated id ";
	document.getElementById("con").disabled=true;}
else if(student1==student3){document.getElementById("con").disabled=true;
document.getElementById("txtHint5").innerHTML ="repeated id ";}
else{console.log("different user id");
document.getElementById("txtHint5").innerHTML ="";
	document.getElementById("con").disabled=false;
}
}

</script>
</head>
<body onload="test()">
<div id="registration-form">
	<div class='fieldset'>
    <legend>APPLY</legend>
		<form action="2ndyearinsertform.php" method="post" data-validate="parsley">
			<div class='row'>
				<label for='firstname'>Student 1 ID</label>
				<input type="number" placeholder="student 1 ID" name="name1" id="t1"  onkeyup="showUser()"  required><br><b id="txtHint" color="red"></b><br>
			</div>
			<div class='row'>
				<label for="email">student 2 ID</label>
				<input type="number" placeholder="student 2 ID"  name="name2" id="t2"  onkeyup="showUser1()" required><br><b id="txtHint1" color="red"></b><br>
			</div>
			<div class='row'>
				<label for="cemail">student 3 ID</label>
				<input type="number" placeholder="student 3 ID" name="name3" id="t3" onkeyup="showUser2()"  required><br><b id="txtHint2" color="red"></b><br>
			</div>
			
<?php
 if(isset($_REQUEST["err"])){
  echo "student ID repeated";
}

?>

<b id="txtHint4" ></b><br>
<b id="txtHint5" ></b><br>
			<input type="submit" id="con" value="submit">
			

		</form>
		
	</div>
</div></body></html>
