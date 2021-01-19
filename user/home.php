<?php
	session_start();
	$_SESSION["current_page"] = "home";
	$_SESSION["current_bar"] = "dashboard";
	include "admin.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="home.css">
</head>
<body>
	<div class="container">
		<div class="slideshow-container">

			<div class="mySlides fade out"style="width:100%;height: 100%">
			  <div class="numbertext">1 / 4</div>
			  <img src="1.jpg" style="width:100%;height: 100%">
			  <div class="text">Caption Text</div>
			</div>

			<div class="mySlides fade out" style="width:100%;height: 100%">
			  <div class="numbertext">2 / 4</div>
			  <img src="2.jpg" style="width:100%;height: 100%">
			  <div class="text">Caption Two</div>
			</div>

			<div class="mySlides fade out" style="width:100%;height: 100%">
			  <div class="numbertext">3 / 4</div>
			  <img src="3.jpg" style="width:100%;height: 100%">
			  <div class="text">Caption Three</div>
			</div>

			<div class="mySlides fade out" style="width:100%;height: 100%">
			  <div class="numbertext">4 / 4</div>
			  <img src="5.jpg" style="width:100%;height: 100%">
			  <div style="width:100%" class="text">Caption Three</div>
			</div>

			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a>
		</div>
		<br>
		<div style="text-align:center">
			<span class="dot" onclick="currentSlide(1)"></span> 
			<span class="dot" onclick="currentSlide(2)"></span> 
			<span class="dot" onclick="currentSlide(3)"></span> 
			<span class="dot" onclick="currentSlide(4)"></span> 
		</div>

		<script>
		var slideIndex = 1;
		showSlides(slideIndex);
		

		  function auto(n){
		  	showSlides(slideIndex += 1);
		  }
		function plusSlides(n) {
		  showSlides(slideIndex += n);
		}

		function currentSlide(n) {
		  showSlides(slideIndex = n);
		}

		function showSlides(n) 
		{
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("dot");
		  if (n > slides.length) {slideIndex = 1}    
		  if (n < 1) {slideIndex = slides.length}
		  for (i = 0; i < slides.length; i++) 
		  {
		      slides[i].style.display = "none";  
		  }
		  for (i = 0; i < dots.length; i++) 
		  {
		      dots[i].className = dots[i].className.replace(" active", "");
		  }
		  setTimeout(auto, 5000);
		  slides[slideIndex-1].style.display = "block";  
		  dots[slideIndex-1].className += " active";
		}
		</script>
		<div class="products">
			<?php
				$Conn = OpenCon();
				$query = "SELECT products.pro_name,products.search_tags ,products.id, category.cat_name, category.cat_id, products.pro_price, products.pro_quantity, products.pro_status, products.pro_details, products.pro_image 
				FROM products
				LEFT JOIN category
				ON products.cat_id=category.cat_id 
				ORDER BY products.pro_status ASC";
				$result = $Conn->query($query);
			    	$flag=1; 
				if ($result->num_rows > 0) 
				{	
				    while ($row = $result->fetch_assoc()) 
				    {
				    	$i = 0;
				   		$id=$row["id"];
				    	
				    	$name = $row['pro_name'];
				    	// if ($row['pro_status']=='Unavailable') 
				    	// {

				    	// 	// echo $row['pro_status'] . " yo ";
				    	// 	echo '<script>document.getElementById("show_info'.$id.'").setAttribute("class", "un");</script><br>';
					    // }	
				    	
						            echo "<div class='items'>";
						            // $b='img src="data:image/jpeg;base64,'.$row["pro_image"].'"';
									echo "<div class='add_info ' id='show_info".$id."'>";
									// echo '<div class="bgg" style=""></div>';
									echo '<button class="showDetails" id="foo' . $id . '" style="position:relative" onclick="myfun('.$id.', false)"><i class="fa fa-arrow-left"></i></button>';
						            echo "<div><b style='font-size:25px'>Details</b><br>Category - ".$row["cat_name"]."
			            		        <br>Details - ".$row["pro_details"]."
			            		        <br>Quantity - ".$row["pro_quantity"]."
			            		        <br>Status - ".$row["pro_status"]."
						            	</div>
						            ";
						            echo "</div>";
						            echo "<div class='curr_info ".($row['pro_status']=='Unavailable'?"Unavailable":"")."'>"; 
						            if ($row['pro_status']=='Unavailable') 
						            	echo "<div class='un'>Unavailable</div>";
						            echo '<button class="hideDetails" id="foo' . $id . '" style="position:relative" onclick="myfun('.$id.', true)"><i class="fa fa-search"></i></button>';

						            echo '<button class="hideSales" style="position:relative" ></button>';
				echo '<div class="hideSales"  id="main-content'.$id.'">';
			?>
									  <div>
									    <input type="checkbox" id="checkbox" />
									    <label for="checkbox">
									      <svg id="heart-svg" viewBox="467 392 58 57" xmlns="http://www.w3.org/2000/svg">
									        <g id="Group" fill="none" fill-rule="evenodd" transform="translate(467 392)">
									          <path d="M29.144 20.773c-.063-.13-4.227-8.67-11.44-2.59C7.63 28.795 28.94 43.256 29.143 43.394c.204-.138 21.513-14.6 11.44-25.213-7.214-6.08-11.377 2.46-11.44 2.59z" id="heart" fill="#AAB8C2"/>
									          <circle id="main-circ" fill="#E2264D" opacity="0" cx="29.5" cy="29.5" r="1.5"/>

									          <g id="grp7" opacity="0" transform="translate(7 6)">
									            <circle id="oval1" fill="#9CD8C3" cx="2" cy="6" r="2"/>
									            <circle id="oval2" fill="#8CE8C3" cx="5" cy="2" r="2"/>
									          </g>

									          <g id="grp6" opacity="0" transform="translate(0 28)">
									            <circle id="oval1" fill="#CC8EF5" cx="2" cy="7" r="2"/>
									            <circle id="oval2" fill="#91D2FA" cx="3" cy="2" r="2"/>
									          </g>

									          <g id="grp3" opacity="0" transform="translate(52 28)">
									            <circle id="oval2" fill="#9CD8C3" cx="2" cy="7" r="2"/>
									            <circle id="oval1" fill="#8CE8C3" cx="4" cy="2" r="2"/>
									          </g>

									          <g id="grp2" opacity="0" transform="translate(44 6)">
									            <circle id="oval2" fill="#CC8EF5" cx="5" cy="6" r="2"/>
									            <circle id="oval1" fill="#CC8EF5" cx="2" cy="2" r="2"/>
									          </g>

									          <g id="grp5" opacity="0" transform="translate(14 50)">
									            <circle id="oval1" fill="#91D2FA" cx="6" cy="5" r="2"/>
									            <circle id="oval2" fill="#91D2FA" cx="2" cy="2" r="2"/>
									          </g>

									          <g id="grp4" opacity="0" transform="translate(35 50)">
									            <circle id="oval1" fill="#F48EA7" cx="6" cy="5" r="2"/>
									            <circle id="oval2" fill="#F48EA7" cx="2" cy="2" r="2"/>
									          </g>

									          <g id="grp1" opacity="0" transform="translate(24)">
									            <circle id="oval1" fill="#9FC7FA" cx="2.5" cy="3" r="2"/>
									            <circle id="oval2" fill="#9FC7FA" cx="7.5" cy="2" r="2"/>
									          </g>
									        </g>
									      </svg>
									    </label>
									 </div>
									</div>	            
			<?php

						    		echo '<img style="margin-top:-10px;margin-left:-50px;" src="data:image/jpeg;base64,'.$row["pro_image"].'"/>';
									echo "<br>";
									echo $name;
									echo "<br>";
									echo "₹".$row["pro_price"];
									echo "<br>";
									echo "<div class='but'>";
									echo "<div><button class='AddToCart'>Add To Cart</button></div>";
									echo "<div>";
									?>
									
									<?php
									echo "</div>";
									echo "</div>";
							        echo '</div>';
							        // echo "<div class='sales'>";
						         //    echo '<button class="showSales" id="foo' . $id . '" style="position:relative" onclick="myfun('.$id.', false)"><i class="fa fa-arrow-right"></i></button>';
						         //    echo "</div>";
									echo "</div>";
							        $flag=0;
							    // }
						    // }
				    	// }
						
				    	// }
					}
				}
				if ($flag==1) 
				{
					echo "<h2 style='color:red; text-align:center'>No such Productis are available</h2>";
				}
			?>
			
			<script>
        		var i =1;
        		function myfun(id, remove)
        		{
        			if(remove)
        			{
        				document.getElementById('show_info' + id).setAttribute('class', 'add_info showing');
        			}
        			else
        			{
        				document.getElementById('show_info' + id).setAttribute('class', 'add_info');
        			}
        		}
       		</script>
		</div>
	</div>
</body>
</html>