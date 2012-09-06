<?php
session_start();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Registration Form</title>
	<style>
		label{
			display: block;
		}
	</style>
</head>
<body>
	<h3>Sign up!</h3>
	<form action="signup.php" enctype="multipart/form-data" method="post">
		<label>
			User name: <input type="text" name="username" />
		</label>
		<label>
			Password: <input type="password" name="password" />
		</label>
		<input type="submit" />
	</form>
	<h3>Log in!</h3>
	<?php
		if(!empty($_SESSION['logintry']))
		{
	?>
	<div class="failure">Your login attempt was a colossal failure!
	Please again try!</div>
	<?php
		}
	?>
	<form action="login.php" enctype="multipart/form-data" method="post">
		<label>
			User name: <input type="text" name="username" />
		</label>
		<label>
			Password: <input type="password" name="password" />
		</label>
		<input type="submit" />
	</form>
</body>
</html>