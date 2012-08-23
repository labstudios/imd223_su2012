<?php require_once("employee.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Database Object Example</title>
    <link rel="stylesheet" href="css/screen.css" />
</head>
<body>
    <?php
    	$employees = Employee::getEmployees();
    	foreach($employees as $employee)
    	{
    		echo "<p>$employee->first_name $employee->last_name</p>";
    	}
    	
    	$newEmp = new Employee();
    	$newEmp->first_name = "Frederick";
    	$newEmp->last_name = "Rogers";
    	$newEmp->user_name = "pirate";
    	$newEmp->save();
    	//echo $newEmp->first_name;
    ?>
</body>
</html>








