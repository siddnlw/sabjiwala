<?php
	session_start();
	$_SESSION["current_bar"] = "category";
	include "admin.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>catagory</title>
	<link rel="stylesheet" href="cat_style.css">
</head>
<body>
	<div class="container">
		<h2 class="title">Category</h2>
		<div class="flex">
			<?php
				$Conn = OpenCon();
				$query = "SELECT * FROM category";
				$result = $Conn->query($query);
				echo '<table border="0" cellspacing="2" cellpadding="2"> 
				      <tr> 
				         <th> <b> <font face="Arial">Category ID</font> </b> </th> 
				         <th> <b> <font face="Arial">Category Name</font> </b> </th>  
				      </tr>';
				if ($result->num_rows > 0) 
				{
				    while ($row = $result->fetch_assoc()) 
				    {
				    	$category=$row["cat_name"];
				    	if ($category!='') 
				    	{
				    		echo '<tr> 
			        		<td>'.$row["cat_id"].'</td> 
			        		<td>'.$category.'</td>
			              	</tr>';
				    	}
				    	else
				    	{
				    		echo "there are no category available";
				    	}
				    }
				}
			?>
			<div class="add">
				<a href="add_category.php" class="n"> AddCategory</a>
			</div>
		</div>
	</div>
</body>
</html>
