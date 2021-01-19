<?php
	session_start();
	$_SESSION["current_bar"] = "users";
	include "admin.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
	<link rel="stylesheet" href="pro_style.css">
	<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
</head>
<body>
	<div class="container">
		<h2 class="title">Users</h2>
		<div class="flex">
			<?php
				$Conn = OpenCon();
				$query = "SELECT * FROM admin";
				$result = $Conn->query($query);
				echo '
					<table border="0" cellspacing="2" cellpadding="2" class="sortable"> 
			     	<tr> 
			        	<th> <b> <font face="Arial">Email ID</font> </b> </th> 
			        	<th> <b> <font face="Arial">UserName</font> </b> </th>  
			        	<th> <b> <font face="Arial">User Type</font> </b> </th>  
			      	</tr>
				';
				if ($result->num_rows > 0) 
				{
					while ($row = $result->fetch_assoc()) 
					{

					   	if ($row["id"]!='') 
					   	{
					    	echo '<tr class="item"> 
				        		<td>'.$row["email-id"].'</td> 
				        		<td>'.$row["username"].'</td>
				        		<td>'.$row["user_type"].'</td>
				        		';
					    }
				    	elseif ($row["id"]!='') 
				    	{
				    		echo "there are no users available";
				    	}
					}
				}
			?>
			<div class="add">
				<a href="add_users.php" class="n"> Add Users</a>
				<a href="update_users.php" class="n"> Update Users</a>
			</div>	
		</div>
	</div>
</body>
</html>
