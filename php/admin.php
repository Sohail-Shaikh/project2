<?php
session_start();
require_once('lists_function.php');
$users_list= new manage_list();
if(isset($_POST['submit']))
{
	if(empty($_POST['emails']) || empty($_POST['passwords']))
	{
		echo"<script type='text/javascript'>alert('Please Enter the Email and Password!')</script>";
	}
	else
	{
		$login=$users_list->admin_login($_POST);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 align="center">Admin Login</h1>
	<div>
		<center><form action="" method="post" id="login_form">		
			<input type="Email" name="emails" id="emails" placeholder="Email Address" onchange="ValidateEmail(emails);" /><br /><br>			   
			<input type="password" name="passwords" placeholder="Password" id="passcode" />
			<img src="https://png.icons8.com/show-password/ios7/25" title="Show Password" width="25" height="25" onmouseover="mouseoverPass();" onmouseout="mouseoutPass();"><br><br>
			<input type="submit" value="Login" name="submit" id="submit_login"   /><br />
		</form></center>
	</div>
	<div id="pswd_info">		<h4>Password must be requirements</h4>
		<ul>
			<li id="letter" class="invalid">At least <strong>one letter</strong></li>
			<li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
			<li id="number" class="invalid">At least <strong>one number</strong></li>
			<li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
			<li id="space" class="invalid">be<strong> use [~,!,@,#,$,%,^,&,*,-,=,.,;,']</strong></li>
		</ul>
	</div>
	<script type = "text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="script.js"></script>
</body>
</html>

