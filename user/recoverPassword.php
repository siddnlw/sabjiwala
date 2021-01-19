<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<!DOCTYPE html>
<html>
<head>
	<title>Password Recovery</title>
	<link rel="stylesheet" href="recoverPassword.css">
</head>
<body>
	<div class="cont">
  		<div class="demo">
   			<div class="login">
    			<div class="icon_login">
					<!-- <img src="download-removebg-preview.png" style="padding-left: 35px;"> -->
					<img class="img" src="img2.png" style="width: 20%;height: auto;margin-left: 40%;margin-top: 15%;">
					<h2 style="text-align: center;color: white;font-size: 25px;margin-top: 5%;">Forget Password?</h2>
					<h3 style="text-align: center;color: #d8d5d2;font-size: 10px;padding-top: 15px">you can reset your password here</h3>
     			</div>
     			<form method="POST" action="" autocomplete="off">
				    <div class="login__form">
	       				<div class="login__row">
	        		  		<svg class="login__icon name svg-icon" viewBox="0 0 20 20">
	            				<path  d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
	          				</svg>
	          				<input type="email" title="Enter your Email ID" value="" onchange="this.setAttribute('value', this.value);" class="login__input name" name="email" required="" />
	          				<span class="focus-border"></span>
	          				<label class="placeholder">Email-ID</label>
	        			</div>
	        			<input type="submit" name="login" class="login__submit" onclick="check()" value="Reset My Password" required=""> 
	        			<h3 style="color: #7C8B73;font-size: 10px;;margin-top: 25%;">Got your password?<a href="adminLogin.php" style="color:#8CC63F;">Click Here</a></h3>
	     			</div>
					<?php
						if(isset($_POST['login']))
						{
						    include "dbSabziWala.php";
						    $Conn = OpenCon();
						     
						    $emailId = $_POST['email'];
						 
						    // $result = mysqli_query($Conn,"SELECT * FROM userlogin WHERE email='" . $emailId . "'");
						    $query = "SELECT * FROM userlogin";
							$result = $Conn->query($query);
						 
						    // $row= mysqli_fetch_array($result);
							if ($result->num_rows > 0) 
							{
							    while ($row = $result->fetch_assoc()) 
							    {
								  	if($row['email']==$emailId)
								  	{
								     
									    // $token = md5($emailId).rand(10,9999);
									 
									    // $expFormat = mktime(
									    // date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
									    // );
									 
									    // $expDate = date("Y-m-d H:i:s",$expFormat);
									 
									    // $update = mysqli_query($conn,"UPDATE users set  password='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");
									    // $Id = $row['id'];

									    // $link = "<a href='resetPassword.php?key=".$Id."&amp;token=".$token."'>Click To Reset password</a>";
									 
									    // require_once('phpmail/PHPMailerAutoload.php');
									 
									    // $mail = new PHPMailer();
									 
									    // $mail->CharSet =  "utf-8";
									    // $mail->IsSMTP();
									    // // enable SMTP authentication
									    // $mail->SMTPAuth = true;                  
									    // // GMAIL username
									    // $mail->Username = "your_email_id@gmail.com";
									    // // GMAIL password
									    // $mail->Password = "your_gmail_password";
									    // $mail->SMTPSecure = "ssl";  
									    // // sets GMAIL as the SMTP server
									    // $mail->Host = "smtp.gmail.com";
									    // // set the SMTP port for the GMAIL server
									    // $mail->Port = "465";
									    // $mail->From='your_gmail_id@gmail.com';
									    // $mail->FromName='your_name';
									    // $mail->AddAddress('reciever_email_id', 'reciever_name');
									    // $mail->Subject  =  'Reset Password';
									    // $mail->IsHTML(true);
									    // $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
									    // if($mail->Send())
									    // {
									      echo "
												<div class='time' style='padding-right:7px;text-align: center;background-color:rgb(138, 197, 58,0.7);margin-top: 15px;margin-left:10px; margin-right:10px; 
										     		padding-top:10px;
									    padding-bottom:10px;'>
										     		<span style='color: #fff; font-size: 15px; text-align: center;margin:15px;'>Check Your Email and Click on the link sent to your email</span></div>
									      ";
									    // }
									    // else
									    // {
									    //   echo "Mail Error - >".$mail->ErrorInfo;
									    // }
									}
									else {
									    echo "<div class='time' style='text-align: center;background-color:rgb(251, 19, 0,0.7);padding-top: -50px;margin-top: 15px; padding-top:10px;
									    padding-bottom:10px;margin-left:10px; margin-right:10px;
										     		'>
										     		<span style='color: #fff; font-size: 15px; text-align: center;margin:15px;'>This Email ID is not registered <br>Or Invalid Email ID </span></div>";
									}
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



