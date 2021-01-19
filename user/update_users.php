<?php
session_start();
	$_SESSION["current_bar"] = "users";
	include "admin.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Users</title>
	<link rel="stylesheet" href="cat_style.css">
</head>
<body>
	<div class="container">
		<h1>Update User</h1>
		<form method="POST" action="add_users.php" style="padding-top: 40px; padding-left: 300px">
			<input type="text" name="name" placeholder="User Name" style="height: 30px;width: 250px" required=""><br><br>
			<input type="email" name="email" placeholder="Email ID" style="height: 30px;width: 250px" required=""><br><br>
			<select name="type" style="height: 37px;width: 260px">
				<option value="admin">admin</option>
				<option value="HR">HR</option>
				<option value="manager">Manager</option>
				<option value="employee">Employee</option>
			</select><br><br>
			<input type="password" name="password" placeholder="Password" style="height: 30px;width: 250px" required=""><br><br>
			<input type="password" name="ConfirmPassword" placeholder="Confirm Password" style="height: 30px;width: 250px" required=""><br><br>
			<input type="submit" class="submit" name="submit"style=";width: 130px; margin-left:65px;">
		</form>
		<?php
	
			if(array_key_exists('submit', $_POST))  
        		check(); 
   			function check()
   			{
				$Conn = OpenCon();
		    	$query = "SELECT * FROM admin";
				$result = $Conn->query($query);
				$email_id=$_POST['email'];
				$name=$_POST['name'];
				$type=$_POST['type'];
				$password=$_POST['password'];
				$conPass=$_POST['ConfirmPassword'];
				if ($result->num_rows > 0) 
				{
				    while ($row = $result->fetch_assoc()) 
				    {
				    	$email = $row["email-id"];
						$already = '0';
			    		if ($email != $email_id) 
			    			$already= '1';
				    }
				} 
				if ($already == '0')
				{
					echo "<h4>This email-id is already exist<h4>";
					die();	
				}
				else
				{
					if ($password == $conPass)
					{
						$password = md5($password);
						$sql = "INSERT INTO `admin`( `email-id`, `username`, `password`, `user_type`) VALUES ('$email_id','$name','$password','$type')";
						$message = "your entery has been recorded";
						$message2 = "Error: " . $sql . "<br>" . $Conn->error;
						if ($Conn->query($sql) === TRUE) 
						{
				 		   header("Location: users.php");
				 		   die();
						} 
						else 
						{
							echo "<h4>Error: " . $sql . "<br>" . $Conn->error."<h4>";
						   die();
						}
					}
					else
					{
						echo "<h4>Password dosen't match<h4>";
						die();
					}
				}
			}	
		?>
	</div>
</body>
</html>
