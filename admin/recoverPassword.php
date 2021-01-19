<!DOCTYPE html>
<html>
<head>
	<title>Password Recovery</title>
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
	        			</div>
	        			<input type="submit" name="login" class="login__submit" onclick="check()" value="Submit" required=""> 
	        			<h3 style="color: #7C8B73;font-size: 10px;">Got your password?<a href="adminLogin.php" style="color:#8CC63F;">Click Here</a></h3>
	     			</div>
	     			<?php
	     				if (isset($_POST['login'])) 
	     				{
	     					echo "
	     					<div style='text-align: center;background-color:#8AC53A;padding-top: -50px;margin-top: -20px; top: -20px; margin-left:10px; margin-right:10px;
	     					border-top:solid ; border-bottom:solid; border-color:#8AC53A; border-width:10px;'>
	     					<span style='color: #fff; font-size: 15px; text-align: center;margin:15px;'>Check your Email id for Recovery Password link </span></div>";
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
