<!DOCTYPE HTML> 



<!-- timer program   -->



<html> 

<head> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style> 
body{ 

    text-align: center; 

    background: #00ECB9; 

  font-family: sans-serif; 

  font-weight: 100; 

} 

h1{ 

  color: #396; 

  font-weight: 100; 

  font-size: 40px; 

  margin: 40px 0px 20px; 

} 

 #clockdiv{ 

    font-family: sans-serif; 

    color: #fff; 

    display: inline-block; 

    font-weight: 100; 

    text-align: center; 

    font-size: 30px; 

} 

#clockdiv > div{ 

    padding: 10px; 

    border-radius: 3px; 

    background: #00BF96; 

    display: inline-block; 

} 

#clockdiv div > span{ 

    padding: 15px; 

    border-radius: 3px; 

    background: #00816A; 

    display: inline-block; 

} 

smalltext{ 

    padding-top: 5px; 

    font-size: 16px; 

} 

</style> 

</head> 

<body> 

<h1>Countdown Clock</h1> 

<div id="clockdiv"> 

  <div> 

    <span class="days" id="day"></span> 

    <div class="smalltext">Days</div> 

  </div> 

  <div> 

    <span class="hours" id="hour"></span> 

    <div class="smalltext">Hours</div> 

  </div> 

  <div> 

    <span class="minutes" id="minute"></span> 

    <div class="smalltext">Minutes</div> 

  </div> 

  <div> 

    <span class="seconds" id="second"></span> 

    <div class="smalltext">Seconds</div> 

  </div> 

</div> 

  

<p id="demo"></p> 


<script> 

 

var deadline =6000;

  count=0;

var x = setInterval(function() { 

deadline -=1000;  
console.log(count);


var t = deadline; 
var days = Math.floor(t / (1000 * 60 * 60 * 24)); 

var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 

var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 

var seconds = Math.floor((t % (1000 * 60)) / 1000); 

document.getElementById("day").innerHTML =days ; 

document.getElementById("hour").innerHTML =hours; 

document.getElementById("minute").innerHTML = minutes;  

document.getElementById("second").innerHTML =seconds;  

if (t < 1000) { 

  deadline=6000;
  count++;
  if(count==5){clearInterval(x);}
  xmlhttp = new XMLHttpRequest();
       
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("sr").innerHTML = this.responseText;
				
            }
        };
        xmlhttp.open("GET","timerallot.php?q="+count,true);
        xmlhttp.send();
    
} 

}, 1000);

</script> 
<table   class="table table-bordered">
<thead>
<tr>
    <th>rank</th>
	<th>id1</th>
	<th>name1</th>
	<th>id2</th>
    <th>name2</th>
	<th>id3</th>
	<th>name3</th>
	<th>room alloted</th>
</tr>
</thead>
</table>
<table id="sr" class="table table-bordered"></table>


</body> 

</html> 