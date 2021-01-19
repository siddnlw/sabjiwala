<?php
	session_start();
	$_SESSION["current_bar"] = "products";
	include "admin.php";
?>
<!-- <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script> -->
<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<link rel="stylesheet" href="pro_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
</head>
<body>
	<a href="update.php?PID=<?=$row['id']?>">Delete</a>
	<div class="container">
		<h2 class="title">Products</h2>
		<?php
			$Conn = OpenCon();
			$query = "SELECT * FROM category";
			$result = $Conn->query($query);
			echo '<form method="POST" action="filter_product.php"><label style="font-size:20px;padding-right:20px;">Filters</label><select name="Category" id="Category" style="height: 37px;width: 260px; text-align: center;" required="">';
			if ($result->num_rows > 0) 
			{
				while ($row = $result->fetch_assoc()) 
				{
					$Cat_id = (isset($_POST['Category']) ? $_POST['Category'] : '');
					$catID=$row["cat_id"];
    				$category=$row["cat_name"];
	    			$_SESSION['catName'] = $category;
				   	if ($category!='') 
				   	{
				   		if ($Cat_id==$catID) 
				   		{
				    		echo '<option value='.$catID.' selected>'.$category.'</option>';
				   		}
				   		else
				   		{
				    		echo '<option value='.$catID.'>'.$category.'</option>';
				   		}	
				    }
			    	elseif($category =='')
			    	{
			    		echo "there are no category available";
			    	}
				}
			}
			echo " </select>";
			$option = (isset($_POST['Category']) ? $_POST['Category'] : '');
			echo '<a href="filter_product.php?id='.$option.'"><button type="submit" style="margin-left:20px;height: 37px;width:60px;">Apply</button></a>';
			echo"</form>";
		?>
		<div class="flex">
			<?php
				$Conn = OpenCon();
				if(isset($_GET["deleteId"])) 
				{
		            $idd =$_GET["deleteId"];
		            $sql = "DELETE FROM `products` WHERE id= '$idd' ";
	        		if ($Conn->query($sql) === TRUE) 
	        		{
	            		echo "<script>window.location.href = '/sid/sabziwala/products.php';</script>";
	        		} 
	            	else 
	        		{
	        			echo "alert('Product didnt got deleted')";
	        		}
		        }
				$Cat_id = (isset($_POST['Category']) ? $_POST['Category'] : '');
				$query = "SELECT products.pro_name, products.id, category.cat_name, category.cat_id, products.pro_price, products.pro_quantity, products.pro_image 
				FROM products
				LEFT JOIN category
				ON products.cat_id=category.cat_id";
				$result = $Conn->query($query);
				echo '<table border="0" cellspacing="2" cellpadding="2" class="sortable"> 
				      <tr> 
				         <th> <b> <font face="Arial">Product image</font> </b> </th> 
				         <th> <b> <font face="Arial">Product Name</font> </b> </th>  
				         <th> <b> <font face="Arial">Category Name</font> </b> </th> 
				         <th> <b> <font face="Arial">Product Price</font> </b> </th>  
				         <th> <b> <font face="Arial">Product Quantity</font> </b> </th> 
				      </tr>';
				if ($result->num_rows > 0) 
				{
					while ($row = $result->fetch_assoc()) 
					{
					   	if ($row["pro_name"]!='') 
					   	{
					   		if ($Cat_id==$row['cat_id'])
							{
						   		$id=$row["id"];
						    	echo '<tr class="item"> 
					        		<td ><img src="data:image/jpeg;base64,'.$row["pro_image"].'"/></td>
					        		<td>'.$row["pro_name"].'</td>
					        		<td>'.$row["cat_name"].'</td> 
					        		<td>'.$row["pro_price"].'</td>
					        		<td>'.$row["pro_quantity"].'</td>
					              	<td><a href="update.php?id='.$id.'"><button class="edit" id="edit" name="edit" value="1" ><i class="fa fa-pencil"></i></button></a></td>
					              	<td>';
			?>
				              	<div class="add" >
				              		<!-- <a href="id=1"> -->
									<button class="del" id="<?php echo $id; ?>" onclick="document.getElementById('id<?php echo $id; ?>').style.display='block'"><i class="fa fa-trash"></i></button>
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
				              	<td>
				              	</tr>
			<?php
			            	}  
		            	}	
			    	}
				}
			?>
			<div class="addP">
				<a href="add_products.php" class="n"> AddProducts</a>
			</div>	
		</div>
	</div>
</body>
</html>
