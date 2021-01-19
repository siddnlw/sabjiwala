<?php
	session_start();
	$_SESSION["current_page"] = "";
	$_SESSION["current_bar"] = "";
	include "admin.php";
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="search.css">
</head>
<body>
	<div class="container">
		<h1>Serach Results</h1>
		<div class="products">
			<?php
				$Conn = OpenCon();
				$query = "SELECT products.pro_name,products.search_tags ,products.id, category.cat_name, category.cat_id, products.pro_price, products.pro_quantity, products.pro_status, products.pro_details, products.pro_image 
				FROM products
				LEFT JOIN category
				ON products.cat_id=category.cat_id";
				$result = $Conn->query($query);
				if ($result->num_rows > 0) 
				{	
			    	$flag=1; 
				    while ($row = $result->fetch_assoc()) 
				    {
				    	$i = 0;
				   		$id=$row["id"];
				    	$search_tags=$row["search_tags"];
				    	$search = $_GET['search'];
				    	$_SESSION['val'] = $_GET['search'];
				    	$name = $row['pro_name'];
				    	$ser=explode(" ",$search_tags);
				    	$count=str_word_count($search_tags);
				    	$ser2=explode(" ",$search);
				    	$count2=str_word_count($search);
				    	for ($i=0; $i < $count ; $i++) 
				    	{
				    		for ($j=0; $j < $count2 ; $j++) 
				    		{ 
						    	if ($ser[$i] == $ser2[$j])
						    	{	
						            echo "<div class='items'>";
						            // $b='img src="data:image/jpeg;base64,'.$row["pro_image"].'"';
									echo "<div class='add_info' id='show_info".$id."'>";
									// echo '<div class="bgg" style=""></div>';
									echo '<button class="showDetails" id="foo' . $id . '" style="position:relative" onclick="myfun('.$id.', false)"><i class="fa fa-arrow-left"></i></button>';
						            echo "<div><b style='font-size:25px'>Details</b><br>Category - ".$row["cat_name"]."
			            		        <br>Details - ".$row["pro_details"]."
			            		        <br>Quantity - ".$row["pro_quantity"]."
			            		        <br>Status - ".$row["pro_status"]."
						            	</div>
						            ";
						            echo "</div>";
						            echo "<div class='curr_info'>";
						            echo '<button class="hideDetails" id="foo' . $id . '" style="position:relative" onclick="myfun('.$id.', true)"><i class="fa fa-search"></i></button>';
						            // echo '<button class="hideSales" id="foo' . $id . '" style="position:relative" onclick="myfun('.$id.', true)"><i class="fa fa-info"></i></button>';
						    		echo '<img src="data:image/jpeg;base64,'.$row["pro_image"].'"/>';
									echo "<br>";
									echo $name;
									echo "<br>";
									echo "₹".$row["pro_price"];
									echo "<br>";
									echo "<div class='but'>";
									echo '<a href="update.php?id='.$id.'"><button class="edit" id="edit" name="edit" value="1" ><i class="fa fa-pencil"></i></button></a>';
									?>
									<div class="add" >
										<button class="del" id="<?php echo $id; ?>" onclick="document.getElementById('id<?php echo $id; ?>').style.display='block'"><i class="fa fa-trash"></i>
										</button>
							     		<div id="id<?php echo $id; ?>" class="modal">
				              				<div class="background">
								       			<span onclick="document.getElementById('id<?php echo $id; ?>').style.display='none'" class="close" title="Close">×</span>
								        		<form class="modal-content" action="">
									          		<div class="box">
										            	<h1>Delete product</h1>
										            	<p>Are you sure you want to delete this product?</p>
										            	<div class="clearfix">
										             		<button type="button" onclick="document.getElementById('id<?php echo $id; ?>').style.display='none'" class="cancelbtn">Cancel</button>
										              		<button type="button" onclick="window.location.href = '/sid/sabziwala/products?deleteId=<?php echo $id; ?>';"    name="deletebtn" class="deletebtn">Delete</button>
											           		<script>
																function setValue(id) 
														    	{
														    		window.location.href = (window.location.href + "?deleteId=" + id);
														   		}
							  						 		</script>
								           				</div>
								          			</div>
						       					</form>
						     				</div>
						     			</div>
						    		</div>
									<?php
									echo "</div>";
							        echo '</div>';
							        // echo "<div class='sales'>";
						         //    echo '<button class="showSales" id="foo' . $id . '" style="position:relative" onclick="myfun('.$id.', false)"><i class="fa fa-arrow-right"></i></button>';
						         //    echo "</div>";
									echo "</div>";
							        $flag=0;
							    }
						    }
				    	}
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