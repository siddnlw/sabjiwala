<?php
	session_start();
	$_SESSION["current_bar"] = "products";
	include "admin.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<link rel="stylesheet" href="pro_style.css">
</head>
<body>
	<div class="container">
		<h1>Add Product</h1>
		<form method="POST" action="add_products.php" autocomplete="off" style="padding-top: 40px; padding-left: 300px" enctype="multipart/form-data">
			<input type="Product Name" class="in" name="pro_name" placeholder="Product Name" style="height: 30px;width: 250px" required=""><br><br>
			<input type="number" name="pro_price" class="in" placeholder="price (per kg )" style="height: 30px;width: 250px" required=""><br><br>
			<input type="text" name="pro_details" class="in" placeholder="Product Description" style="height: 30px;width: 250px" required=""><br><br>
			<input type="text" name="search_tags" class="in" placeholder="Search Tags (color, bread, type, etc)" style="height: 30px;width: 250px" required=""><br><br>
			<input type="number" name="pro_quantity" class="in" placeholder="Product Quantity" style="height: 30px;width: 250px" required=""><br><br>
			<select name="pro_status" style="height: 37px;width: 260px">
				<option value="Available">Available</option>
				<option value="Unavailable">Unavailable</option>
			</select><br><br>
		  	<?php
				$Conn = OpenCon();
				$query = "SELECT * FROM category";
				$result = $Conn->query($query);
				echo '<select name="Category" id="Category" style="height: 37px;width: 260px" required="">';
				if ($result->num_rows > 0) 
				{
					while ($row = $result->fetch_assoc()) 
					{
						$catID=$row["cat_id"];
	    				$category=$row["cat_name"];
		    			$_SESSION['catName'] = $category;

					   	if ($category!='') 
					   	{
					    	echo '<option value='.$catID.'>'.$category.'</option>';
					    }
				    	elseif($category =='')
				    	{
				    		echo "there are no category available";
				    	}
					}
				}
				echo " </select>";
			?>
			<br><br>
			<input type="file" name="image" placeholder="image" style="height: 30px;width: 250px" required=""><br><br>
			<input type="submit" class="submit" name="submit"style="width: 130px; margin-left:65px;">
			<?php
				if(array_key_exists('submit', $_POST))  
			        check(); 
			    function check()
			    {
				    $Conn = OpenCon();
				   	$qur = "SELECT * FROM products";
					$result = $Conn->query($qur);
					if ($result->num_rows > 0) 
					{
					    while ($row = $result->fetch_assoc()) 
					    {
					    	$name=$row['pro_name'];
					    	$proName=$_POST["pro_name"];
					    	$proPrice=$_POST["pro_price"];
					    	$proDetails=$_POST["pro_details"];
					    	$search_tags=$_POST["search_tags"];
					    	$proQuantity=$_POST["pro_quantity"];
					    	$proStatus=$_POST["pro_status"];
					    	$id=$_POST['Category'];
					    	$flag=0;
					  		if (strtolower($row['pro_name']) == strtolower($_POST['pro_name'])) 
					  		{
	    						echo "<h4>Product already exist<h4>";
					    		die();
					    	}
		    				elseif (strtolower($row['pro_name']) != strtolower($_POST['pro_name'])) 
		    				{	
			    				if (($_FILES["image"]["type"] == "image/jpeg") || ($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "image/png")) 
			    				{	
			            			if ($_FILES["image"]["size"] < 10500000) 
			            			{
							    		$flag=1;
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
					if ($flag==1) 
					{
						$filename= $_FILES['image']['name'];
						$filetmpname= $_FILES['image']['tmp_name'];
						$filetmpname = base64_encode(file_get_contents(addslashes($filetmpname)));
						$sql = "INSERT INTO products (cat_id, pro_name,	pro_price,	pro_details, pro_quantity,pro_image,pro_image_name, pro_status, search_tags)
							VALUES ('$id', '$proName', '$proPrice', '$proDetails', '$proQuantity','$filetmpname','$filename', '$proStatus', '$search_tags')";
						$message2 = "Error: " . $sql . "<br>" . $Conn->error;
						if ($Conn->query($sql) === TRUE) 
						{
							echo("<script>window.location.href = '/sid/sabziwala/products.php';</script>");
							exit;
		   					echo "<h4>The product has been added successfully<h4>";
						} 
						else 
						{
							echo "<script type='text/javascript'>alert('$message2');</script>";
  							die();
						}
					}
				}
			?>
		</form>
	</div>
</body>
</html>