<?php
session_start();
	$_SESSION["current_bar"] = "products";
	include "admin.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete Product</title>
	<link rel="stylesheet" href="pro_style.css">
</head>
<body>
	<div class="container">
		<h1>Delete Product</h1>
		<form method="POST" action="" style="padding-top: 40px; padding-left: 300px" enctype="multipart/form-data"style="margin-top: -100px;">
			<?php
		
			    $Conn = OpenCon();
			    $id = (isset($_GET['id']) ? $_GET['id'] : '');
			    // echo $id;
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
					    	// $iName=$row['pro_image_name'];
					    	$details=$row['pro_details'];
					    	// $name=$row['pro_image'];
					    	// $cat=$row['Category'];

					    	// echo $price;
				    		echo '
				    		<lable>Product Name</lable>
							<input type="Product Name" name="pro_name" placeholder="Product Name" style="height: 30px;width: 250px" value='.substr($name, 0).' ><br><br>

				    		<lable>Product Price</lable>

							<input type="number" name="pro_price" placeholder="price (per kg )" style="height: 30px;width: 250px" required="" value='.$price.'><br><br>

				    		<lable>Product Description</lable>

							<input type="text" name="pro_details" placeholder="Product Description" style="height: 30px;width: 250px" required=""value='.$details.'><br><br>
				    		
				    		<lable>Product Quantity</lable>

							<input type="number" name="pro_quantity" placeholder="Product Quantity" style="height: 30px;width: 250px" required=""value='.$Quantity.'><br><br>
				    		
				    		<lable>Product Status</lable>

							<select name="pro_status" style="height: 37px;width: 260px">
								<option value="Available">Available</option>
								<option value="Unavailable">Unavailable</option>
							</select><br><br>

							<br><br>

							<input type="file" name="image" placeholder="image" style="height: 30px;width: 250px" required><br><br>

							<input type="submit" class="submit" name="submit"style="width: 130px; margin-left:65px;">';

							if(array_key_exists('submit', $_POST))  
							{
					    		$proName=$_POST["pro_name"];
						    	$proPrice=$_POST["pro_price"];
						    	$proDetails=$_POST["pro_details"];
						    	$proQuantity=$_POST["pro_quantity"];
						    	$proStatus=$_POST["pro_status"];
					    		if (($_FILES["image"]["type"] == "image/jpeg")
					            || ($_FILES["image"]["type"] == "image/png"))
					            {	
					            	if ($_FILES["image"]["size"] < 10500000) 
					            	{
								    	
					            		
							    		$filename= $_FILES['image']['name'];
							    		// $imageName = $proName.$_FILES['image']['type'];
										$filetmpname= $_FILES['image']['tmp_name'];
										$filetmpname = base64_encode(file_get_contents(addslashes($filetmpname)));
										// $folder = 'images/'.$filename;
										// move_uploaded_file($filetmpname, $folder);
										// rename('image/'.$filename, $proName);
							    		$sql = "UPDATE `products` SET `pro_price`='$proPrice',`pro_name`='$proName',`pro_details`='$proDetails',`pro_quantity`='$proQuantity',`pro_image`='$filetmpname',`pro_image_name`='$filename',`pro_status`='$proStatus' WHERE id='$id'";

										$message2 = "Error: " . $sql . "<br>" . $Conn->error;

										if ($Conn->query($sql) === TRUE) 
										{
										   header("Location: products.php");
											// echo "<h4>Product Updated<h4>";
										   die();
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
</body>
</html>