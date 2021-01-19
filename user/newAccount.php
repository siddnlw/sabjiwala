<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<!DOCTYPE html>
<html>
<head>
	<title>Create new account</title>
	<link rel="stylesheet" href="newAccount.css">
</head>
<body>
	<div class="cont">
		<div class="container">
		<div class="wel"></div>
  		<div class="demo">
   			<div class="login">
    			<div class="icon_login">
      				<img src="download-removebg-preview.png" style="margin-right: auto;margin-left: auto;margin-top: -35px; display: block;">
     			</div>
    				<!-- <div class="sign-in"><h2>Sign In</h2></div> -->
    				<!-- <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe> -->
     			<form method="POST" action="" autocomplete="off" >
				    <div class="login__form">
	       				<div class="login__row">
	        		  		<svg class="login__icon name svg-icon" viewBox="0 0 20 20">
	            				<path  d="M1,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
	          				</svg>
	          				<input type="text" title="Enter your name " value="" onchange="this.setAttribute('value', this.value);" class="login__input name" id="un" name="username" minlength="3" required="" />
	          				<span class="focus-border"></span>
	          				<label class="placeholder">Username</label>
	        			</div>
	        			<div class="login__row email" style="margin-top: 15px;">
	        		  		<svg class="login__icon name svg-icon" viewBox="0 0 15 15" >
	            				<path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a-2 2 0 0 1-2-2V5zm1 -1a1 1 0 0 0 0 0v.217l7 4.2 7-4.2V4a1 1 0 0 0-1" />
	          				</svg>
	          				<input type="email" title="Enter your Email ID" value="" onchange="this.setAttribute('value', this.value);" class="login__input name" name="EmailID" required="" />
	          				<span class="focus-border"></span>
	          				<label class="placeholder email">Email-ID</label>
	        			</div>
	        			<div class="login__row emaill" style="margin-top: 15px;">
	          				<svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
	            				<path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
	          				</svg>
	          				<input type="password" title="Enter your Password (minimum 8 characters)"  value="" onchange="this.setAttribute('value', this.value);" class="login__input pass" name="password" required="" minlength="8" id="pas" />
	          				<span class="focus-border"></span>
	          				<label class="placeholder pas">Password</label>
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
	        			</div>
	        			<script type="text/javascript">
	        				var i=1;
	        				function toggleClass() 
	        				{
	        					// i++;
								var wrapper = document.getElementById('wrapper');
								wrapper.classList.toggle('eye-open');
								wrapper.classList.toggle('eye-close');
								// if (i%2==0) 
								// {
									// alert("hi");
								  	var x = document.getElementById("pas");
								  	if (x.type === "password") 
								  	{
								   		x.type = "text";
								  	} 
								  	else 
								  	{
								    	x.type = "password";
								  	}
								// }
							}
	        			</script>

	        			<div class="login__row" style="margin-top: 15px;">
	          				<svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
	            				<path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
	          				</svg>
	          				<input type="password" title="Renter your Password "  value="" onchange="this.setAttribute('value', this.value);" class="login__input pass" name="ConfirmPassword" required="" minlength="8" id="ConPas" />
	          				<span class="focus-border"></span>
	          				<label class="placeholder pas">Confirm Password</label>
	          				<div id="wrap" class="eye-close" title="hide/show">
   
							  <div id="icon-eye"onclick="toggleClas()">
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
	        			</div>
	        			<script type="text/javascript">
	        				var i=1;
	        				function toggleClas() 
	        				{
	        					// i++;
								var wrapper = document.getElementById('wrap');
								wrapper.classList.toggle('eye-open');
								wrapper.classList.toggle('eye-close');
								// if (i%2==0) 
								// {
									// alert("hi");
								  	var x = document.getElementById("ConPas");
								  	if (x.type === "password") 
								  	{
								   		x.type = "text";
								  	} 
								  	else 
								  	{
								    	x.type = "password";
								  	}
								// }
							}
	        			</script>
	        			<input type="submit" name="Create" class="login__submit" onclick="check()" value="Sign Up" required=""> 
	        			<div class="header__center">or</div>
	        			<h3  style="color: #7C8B73;font-size: 10px;margin-top: 4%;">Already have an account?<a href="adminLogin.php" class="forget" style="color:#8CC63F;">Click Here</a></h3>
	     			</div>
	     			<?php
						include "dbSabziWala.php";
						// session_start();
						if(array_key_exists('Create', $_POST))  
				        {
				        	check(); 
				        	// $_SESSION["user"] =$_POST['Create'];
				        }
				        function check()
				        {
							$Conn = OpenCon();
							$query = "SELECT * FROM userlogin";
							$result = $Conn->query($query);
							$email_id=$_POST['EmailID'];
							$username=$_POST['username'];
							$password=$_POST['password'];								
							$conPass=$_POST['ConfirmPassword'];								
							if ($result->num_rows > 0) 
							{
								// $isWrong = false;
							    while ($row = $result->fetch_assoc()) 
							    {
									$email=$row["email"];
									$already = 0;
							    	if ($email != $email_id) 
			    						$already= 1;
			    				}
			    			}
							if($already == 0) 
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
										100% {  }
									}

									@-webkit-keyframes blackWhiteFade 
									{  
										0% { color: #FF0046; }
										100% {  }
									}

									.email 
									{
									    font-weight:bold;
									  	-webkit-animation-name: shake;
									  	animation: shak 0.82s cubic-bezier(.56,.07,.19,.97) both;
									  	-webkit-animation-name: blackWhite;
									  	-webkit-animation-name: blackWhiteFade; 
									  	-webkit-animation-iteration-count: 1s;  
									  	-webkit-animation-duration: 5s; 
									} 

									.email .placeholder{
										border: none
									}
									@-webkit-keyframes b 
									{  
									    0% { border-bottom: 1px solid rgba(255, 255, 255, 0.2);
									   border-color: red; }
										100% { border-color:white; }
									}

									@-webkit-keyframes w 
									{  
										0% { border-bottom: 1px solid rgba(255, 255, 255, 0.2);
									   border-color: red; }
										100% {border-color:white;  }
									}

									
									
								</style>
								<div  class='error' style='text-align: center;'>
										<span class='invalid'  style='color: #FF0046;font-weight: bold; font-size: 18px; '>Email id already exist</span>
								</div>";
							}
							else
							{
								if ($password == $conPass)
								{
									$password = md5($password);
									$sql = "INSERT INTO `userlogin`( `username`, `password`, `email`) VALUES ('$username','$password','$email_id')";
									$message = "your entery has been recorded";
									$message2 = "Error: " . $sql . "<br>" . $Conn->error;
									if ($Conn->query($sql) === TRUE) 
									{
										// $_SESSION["userName"]=$username;
										echo "<script>window.location.replace('adminLogin.php');</script>";
							 		   // header("Location: home.php");
							 		   
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

									.pas 
									{
									    font-weight: bold;
									  	-webkit-animation-name: shake;
									  	-webkit-animation-name: blackWhite;
									  	-webkit-animation-name: blackWhiteFade; 
									  	-webkit-animation-iteration-count: 1s;  
									  	-webkit-animation-duration: 5s; 
									} 
								</style>
								<div  class='error' style='text-align: center;'>
										<span class='invalid'  style='color: #FF0046;font-weight: bold; font-size: 17px; '>Password dosen't match</span>
								</div>
								";
									die();
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
	</div>
</body>
</html>
