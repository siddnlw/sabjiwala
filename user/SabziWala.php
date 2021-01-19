<?php
	include "dbsabziwala.php";
	OpenCon();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sabzi Wala</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header >
           <img src="https://lh3.googleusercontent.com/KT22uV81J1Xa-M4z9eYY34BLIJNHXkr4y7LtHmW3koHBa-PzJ1YfD8jvEYoP2AflSg">

            <nav>
                <ul id="myHeader">
                    <li><a href="#" class="n active">Home</a></li>
                    <li><a href="#" class="n">About</a></li>
                    <li><a href="#" class="n">Pricing</a></li>
                    <li><a href="#" class="n">Terms of use</a></li>
                    <li><a href="#" class="n">Contact</a></li>
                </ul>
            </nav>
        </header>
        <header1>
        	<nav>
        		<ul>
                    <li><h3 id="demo">Home</h3></li>
        			
        		</ul>
        	</nav>
        </header1>
        <footer>
        	<nav>
            	<ul id="myFooter">
                	<li><a href="#" class="n" >Vegetables</a></li><hr>
                	<li><a href="#" class="n">Fruits</a></li><hr>
                	<li><a href="#" class="n">Bread And Bakery Items</a></li><hr>
                	<li><a href="#" class="n">Soft Drinks</a></li><hr>
                	<li><a href="#" class="n">Spices</a></li><hr>
                </ul>
            </nav>
            <hr>
        </footer>
</body>
</html>

<script>
var header = document.getElementById("myHeader");
var active = header.getElementsByClassName("n");
for (var i = 0; i < active.length; i++) {
  active[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  
  });
  var x = document.getElementById("myHeader").value;
  document.getElementById("demo").innerHTML = x;
}

var footer = document.getElementById("myFooter");
var active = footer.getElementsByClassName("n");
for (var i = 0; i < active.length; i++) {
  active[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}

// function myFunction() {
//   var x = document.getElementById("myText").value;
//   document.getElementById("demo").innerHTML = x;
// }
</script>