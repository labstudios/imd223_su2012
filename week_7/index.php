<?php require_once("database.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Database Example</title>
    <link rel="stylesheet" href="css/screen.css" />
</head>
<body>
    <?php
    	$db = new Database();
    	
    	$employees = $db->getArray("SELECT * FROM `employees` LIMIT 0,30");
    	
    	foreach($employees as $employee)
    	{
    			echo "$employee->first_name<br />";
    	}
    	
    	/*$newEmployee = new StdClass();
    	$newEmployee->first_name = "George";
    	$newEmployee->last_name = "Jetson";
    	$newEmployee->user_name = "gjetson";
    	
    	if(!$db->insert("employees", $newEmployee))
    	{
    		echo "<p class=\"error\">$newEmployee->user_name has been taken. Please try again with a different user name.</p>";
    	}*/
    	
    	$emp = $db->getItem("SELECT * FROM `employees` WHERE `user_name` = 'gjetson'");
    	
    	echo "<p>Hello, $emp->first_name! Welcome to our site!</p>";
    ?>
</body>
</html>








