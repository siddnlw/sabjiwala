<?php
session_start();
	$_SESSION["current_bar"] = "category";
	include "admin.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Category</title>
	<link rel="stylesheet" href="cat_style.css">
</head>
<body>
	<div class="container">
		<h1>Add Category</h1>
		<form method="POST" action="add_category.php" style="padding-top: 40px; padding-left: 300px">
			<input type="text" name="name" placeholder="Category Name" style="height: 30px;width: 250px" required=""><br><br>
			<input type="number" name="id" placeholder="Category ID" style="height: 30px;width: 250px" required=""><br><br>
			<input type="text" name="descreption" placeholder="Category Description" style="height: 30px;width: 250px" required=""><br><br>
			<input type="text" name="status" placeholder="Category Status" style="height: 30px;width: 250px" required=""><br><br>
			<input type="submit" class="submit" name="submit"style=";width: 130px; margin-left:65px;">
		</form>
		<?php
			if(array_key_exists('submit', $_POST))  
		        check(); 
		    function check()
		    {
			    $Conn = OpenCon();
			   	$query = "SELECT * FROM category";
				$result = $Conn->query($query);

				if ($result->num_rows > 0) 
				{
				    while ($row = $result->fetch_assoc()) 
				    {

				    	$category=$row["cat_name"];
				    	$cid=$row["cat_id"];
				    	$cat=$_POST["name"];
				    	$id=$_POST["id"];
				    	$des=$_POST["descreption"];
				    	$status=$_POST["status"];
				    }
				}
		    	if (strtolower($category)==strtolower($cat)) 
		    	{
		    		echo "<h4>Category already exist<h4>";
		    		die();
		    	}
		    	elseif ($cid==$id) 
		    	{
		    		echo "<h4>Category id already exist<h4>";
		    		die();
		    	}

		    	elseif (strtolower($category) != strtolower($_POST['name']) && $cid != $id)
		    	{
		    		$sql = "INSERT INTO category (cat_name, cat_id, cat_descreption, cat_status)
					VALUES ('$cat', '$id', '$des', '$status')";
					$message = "your entery has been recorded";
					$message2 = "Error: " . $sql . "<br>" . $Conn->error;
					if ($Conn->query($sql) === TRUE) 
					{
					   header("Location: category.php");
					} 
					else 
					{
					   echo "<script type='text/javascript'>alert('$message2');</script>";
					   die();
					}
				}
	    	}
		?>
	</div>
</body>
</html>