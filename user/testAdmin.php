<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" href="adminLogin.css">

</head>
<body>
	<div class="cont">
  		<div class="demo">
   			<div class="login">
    			<div class="icon_login">
      				<img src="download-removebg-preview.png" style="padding-left: 35px;">
     			</div>
     			<form method="POST" action="" autocomplete="off">
				    <div class="login__form">
	       				<div class="login__row">
	        		  		<svg class="login__icon name svg-icon" viewBox="0 0 20 20">
	            				<path  d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
	          				</svg>
	          				<input type="email" value="" onchange="this.setAttribute('value', this.value);" class="login__input name" name="EmailID" required="" />
	          				<span class="focus-border"></span>
	          				<label class="placeholder">Email-ID</label>
	          				<!-- <div class="validation">Not valid</span> -->
	        			</div>
	        			<div class="login__row" style="margin-top: 15px;">
	          				<svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
	            				<path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
	          				</svg>
	          				<input type="password" value="" onchange="this.setAttribute('value', this.value);" class="login__input pass" name="password" required=""  />
	          				<span class="focus-border"></span>
	          				<label class="placeholder">Password</label>
	        			</div>
	        			<input type="submit" name="login" class="login__submit" onclick="check()" value="Log in" required=""> 
	        			<h3 style="color: #7C8B73;font-size: 10px;">Forgot your password?<a class=".card" href="" style="color:#8CC63F;">Click Here</a></h3>
	     			</div>

	     			<script type="text/javascript">
	     				var card = document.querySelector('.card');
						card.addEventListener( 'click', function() 
						{
						  // card.classList.toggle('is-flipped');
						  alert('hi')
						});
	     			</script>

	     			<?php
						include "dbSabziWala.php";
					
						session_start();
						if(array_key_exists('login', $_POST))  
				        {
				        	check(); $_SESSION["user"] =$_POST['login'];
				        }
				        function check()
				        {
							$Conn = OpenCon();
							$query = "SELECT * FROM admin";
							$result = $Conn->query($query);
							$email_id=$_POST['EmailID'];
							$password=$_POST['password'];								
							if ($result->num_rows > 0) 
							{
								$isWrong = false;
							    while ($row = $result->fetch_assoc()) 
							    {
									$user=$row["email-id"];
               						// $_SESSION["type"]=$row["user_type"];
               						$types=$row["user_type"];
									$pass=$row["password"];
									$flag=0;
									// echo($user);
									// echo ($pass);
									if ($row["email-id"]==$email_id && md5($password)==$row["password"]) 
									{
										$_SESSION["type"]=$types;
										$_SESSION["userName"]=$row['username'];
										$r=$_SESSION["userName"];
										// echo "<script>alert('$r')</script>";
										if ($_SESSION["type"]=="admin") 
										{
											$flag=1;
				                            $_SESSION["flag"]=$flag;
				                        }
				                          // $flag2=$flag;
										// echo "<script>alert('$flag2')</script>";
										header("Location: home.php");
										die();
										// echo "<script>alert('ho gaya bhai')</script>";
									}
									elseif ($row["email-id"]!=$_POST['EmailID'] || $_POST['password']!=$row["password"])
									{
										$isWrong = true;
									}
								}
								if($isWrong) 
								{
									echo "
									<style>
										@-webkit-keyframes shake 
										{
											0% {animation: shake 0.02s cubic-bezier(.56,.07,.19,.37) both;
											transform: translate3d(0, 0, 0);
											backface-visibility: hidden;
											perspective: 1000px;}
											100%{color: white;}
										}
										@-webkit-keyframes blackWhite 
										{  
										    0% { color: #FF0046; }
											50% { color: #FF0046; }
											51% { color: #FF0046; }
											100% {  }
										}

										@-webkit-keyframes blackWhiteFade 
										{  
											0% { color: #FF0046; }
											50% { color: #FF0046; }
											100% {  }
										}

										.placeholder 
										{
										    font-weight: bold;
										  	-webkit-animation-name: shake;
										  	-webkit-animation-name: blackWhite;
										  	-webkit-animation-name: blackWhiteFade; 
										  	-webkit-animation-iteration-count: 1s;  
										  	-webkit-animation-duration: 5s; 
										} 
									</style>
									<div id='container' style='text-align: center;'>
  										<span id='invalid' class='invalid' style='color: #FF0046;font-weight: bold; font-size: 17px; '>Invalid Email id or Password</span>
									</div>
									";
								}
							}
						}
     				?>
     			</form>
    		</div>
    		<div class="app">
      			<div class="app__top">
        			<div class="app__menu-btn">
          				<span></span>
        			</div>
        			<svg class="app__icon search svg-icon" viewBox="0 0 20 20">
         				<!-- yeap, its purely hardcoded numbers straight from the head :D (same for svg above) -->
          				<path d="M20,20 15.36,15.36 a9,9 0 0,1 -12.72,-12.72 a 9,9 0 0,1 12.72,12.72" />
        			</svg>

				</div>
			</div>
		</div>
	</div>
</body>
</html>
