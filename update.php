<?php
session_start();
	$_SESSION["current_bar"] = "products";
	include "admin.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Product</title>
	<link rel="stylesheet" href="update.css">
</head>
<body>
	<div class="container">
		<h1>Update Product</h1>
		<div class="flex2">
			<div>
				<form method="POST" action="" style="padding-top: 40px; padding-left: 300px" enctype="multipart/form-data"style="margin-top: -100px;">
					<?php
					    $Conn = OpenCon();
					    $id = (isset($_GET['id']) ? $_GET['id'] : '');
					   	$query = "SELECT * FROM products WHERE id = '$id'";
						$result = $Conn->query($query);
						if ($result->num_rows > 0) 
						{
						    while ($row = $result->fetch_assoc()) 
						    {
						    	if ($id=$row['id']) 
						    	{
							    	$name=$row['pro_name'];
							    	$price=$row['pro_price'];
							    	$Quantity=$row['pro_quantity'];
							    	$staus=$row['pro_status'];
							    	$search_tags=$row['search_tags'];
							    	$details=$row['pro_details'];
						    		echo '
						    		<lable>Product Name</lable>
									<input type="Product Name" name="pro_name" class="in" placeholder="Product Name" style="height: 30px;width: 250px" value="'.substr($name, 0).'" ><br><br>

						    		<lable>Product Price</lable>

									<input type="number" name="pro_price" class="in" placeholder="price (per kg )" style="height: 30px;width: 250px" required="" value="'.$price.'"><br><br>

						    		<lable>Product Description</lable>

									<input type="text" name="pro_details" class="in" placeholder="Product Description" style="height: 30px;width: 250px" required=""value="'.$details.'"><br><br>

						    		<lable>Product Search Tags</lable>

									<input type="text" name="search_tags" class="in"  style="height: 30px;width: 250px" required="" value="'.$search_tags.'" ><br><br>
						    		
						    		<lable>Product Quantity</lable>

									<input type="number" name="pro_quantity" class="in" placeholder="Product Quantity" style="height: 30px;width: 250px" required=""value="'.$Quantity.'"><br><br>
						    		
						    		<lable>Product Status</lable>

									<select name="pro_status" style="height: 37px;width: 260px">
										<option value="Available">Available</option>
										<option value="Unavailable">Unavailable</option>
									</select><br><br>

									<br><br>

									<input type="file" name="image" placeholder="image" style="height: 30px;width: 250px" required><br><br>

									<input type="submit" class="submit" name="submit" value="Update"style="width: 130px; margin-left:65px;">';

									if(array_key_exists('submit', $_POST))  
									{
							    		$proName=$_POST["pro_name"];
								    	$proPrice=$_POST["pro_price"];
								    	$proDetails=$_POST["pro_details"];
								    	$search=$_POST["search_tags"];
								    	$proQuantity=$_POST["pro_quantity"];
								    	$proStatus=$_POST["pro_status"];
							    		if (($_FILES["image"]["type"] == "image/jpeg")
							            || ($_FILES["image"]["type"] == "image/png"))
							            {	
							            	if ($_FILES["image"]["size"] < 10500000) 
							            	{
									    		$filename= $_FILES['image']['name'];
												$filetmpname= $_FILES['image']['tmp_name'];
												$filetmpname = base64_encode(file_get_contents(addslashes($filetmpname)));
									    		$sql = "UPDATE `products` SET `pro_price`='$proPrice',`pro_name`='$proName',`pro_details`='$proDetails',`pro_quantity`='$proQuantity',`pro_image`='$filetmpname',`pro_image_name`='$filename',`pro_status`='$proStatus', `search_tags`='$search' WHERE id='$id'";
												$message2 = "Error: " . $sql . "<br>" . $Conn->error;
												if ($Conn->query($sql) === TRUE) 
												{
													echo("<script>window.location.href = '/sid/sabziwala/products.php';</script>");
													exit;
												} 
												else 
												{
													echo "<script type='text/javascript'>alert('$message2');</script>";
										  			die();
												}
											}

											else
											{
												echo "<h4>Please upload image less than 10MB of size<h4>";
											}
										}
										else
										{
											echo "<h4>Please upload image in jpeg/png format<h4>";
										}
									}
								}
							}	
						}		
					?>
				</form>
			</div>
		</div>
	</div>
</body>
</html>