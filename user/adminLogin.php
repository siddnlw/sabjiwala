<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
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
      				<img src="download-removebg-preview.png" style="padding-left: 35px;margin-top: -8%;">
     			</div>
     			<form method="POST" action="" autocomplete="off">
				    <div class="login__form">
	       				<div class="login__row">
	        		  		<svg class="login__icon name svg-icon" viewBox="0 0 20 20">
	            				<path  d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
	          				</svg>
	          				<input type="email" id="emai" onkeyup='saveValue(this);' value="" title="Enter your Email ID" onchange="this.setAttribute('value', this.value);" class="login__input name" name="EmailID" required="" />
	          				<span class="
	          				"></span>
	          				<label class="placeholder">Email-ID</label>
	        			</div>
	        			<div class="login__row" style="margin-top: 15px;">
	          				<svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
	            				<path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
	          				</svg>
	          				<input type="password" title="Enter your Password " value="" onchange="this.setAttribute('value', this.value);" class="login__input pass" name="password" required="" id="pas"  />
	          				<span class="focus-border"></span>
	          				<label class="placeholder">Password</label>
	          				<div id="wrapper" class="eye-close" title="hide/show">

		          				<div id="icon-eye"onclick="toggleClass()">
								    <svg 
								      viewBox="-20 -200 320 400"
								      xmlns="http://www.w3.org/2000/svg"
								      xmlns:xlink="http://www.w3.org/1999/xlink">
								      <g id="eye" stroke-width="25" fill="none">
								        <g id="eye-lashes" stroke="currentColor">
								          <line x1="140" x2="140" y1="90" y2="180" />
								          <line x1="70"  x2="10"  y1="60" y2="140" />
								          <line x1="210" x2="270" y1="60" y2="140" />
								        </g>
								        
								        <path id="eye-bottom" d="m0,0q140,190 280,0" stroke="currentColor" />
								        <path id="eye-top"    d="m0,0q140,190 280,0" stroke="currentColor" />

								        <circle id="eye-pupil" cx="140" cy="0" r="40" fill="currentColor" stroke="none" />
								      </g>
								    </svg>
								</div>
							</div>
		        				<script type="text/javascript">
				        			function toggleClass() 
		        					{
										var wrapper = document.getElementById('wrapper');
										wrapper.classList.toggle('eye-open');
										wrapper.classList.toggle('eye-close');
									  	var x = document.getElementById("pas");
									  	if (x.type === "password") 
									  	{
									   		x.type = "text";
									  	} 
									  	else 
									  	{
									    	x.type = "password";
									  	}
									}
		        				</script>
	        			</div>
	        			<input type="submit" name="login" class="login__submit" onclick="check()" value="Log in" required=""> 
	        			<div class="header__center">or</div>
	        			<button name="create" onclick="location.href = 'newAccount.php';" class="login__submit create" onclick="check()" value="Log in" required=""> Create a new account</button> 
	        			<h3  style="color: #7C8B73;font-size: 10px;margin-top: 12%;">Forgot your password?<a href="recoverPassword.php" class="forget" style="color:#8CC63F;">Click Here</a></h3>
	     			</div>
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
							$query = "SELECT * FROM userlogin";
							$result = $Conn->query($query);
							$email_id=$_POST['EmailID'];
							$password=$_POST['password'];								
							if ($result->num_rows > 0) 
							{
								$isWrong = false;
							    while ($row = $result->fetch_assoc()) 
							    {
									$user=$row["email"];
               						$name=$row["username"];
									$pass=$row["password"];
									$flag=0;
									if ($row["email"]==$email_id && md5($password)==$row["password"]) 
									{
										// $_SESSION["type"]=$types;
										$_SESSION["userName"]=$row['username'];
										$r=$_SESSION["userName"];
										// echo "<script>alert('$name')</script>";
										// if ($_SESSION["type"]=="admin") 
										// {
										// 	$flag=1;
				      //                       $_SESSION["flag"]=$flag;
				      //                   }
										header("Location: home.php");
										die();
									}
									elseif ($row["email"]!=$_POST['EmailID'] || $_POST['password']!=$row["password"])
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
									<div id='container' style='text-align: center;margin-top:-30px;'>
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
          				<path d="M20,20 15.36,15.36 a9,9 0 0,1 -12.72,-12.72 a 9,9 0 0,1 12.72,12.72" />
        			</svg>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

