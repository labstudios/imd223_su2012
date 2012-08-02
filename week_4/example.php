<?php
require_once("employee.php");

$emp1 = new Employee("bob michaels", "rock star", "22320.73");
$emp2 = new Employee("fred richards", "accountant", 87813.2253);
$emp3 = new HourlyEmployee("george franklin", "sandwich artist", 12.30);
$emp3->salary = 13.22;
Employee::listEmployees();

//The below is how to catch an excption and handle it gracefully
try{
	$emp2->dumbvar = "Wakka wakka wakka";
}
catch(Exception $e)
{
	echo $e->getMessage();
	//$obj = new StdClass();
	//$obj->dumbvar = "Wakka wakka wakka";
}
//var_dump($emp2->dumbvar);
$emp3->clockIn();
//sleep(15);
$emp3->clockOut();

//$emp3->isUnemployed = true;
//var_dump($emp3->isUnemployed);
//echo "<br />";
//var_dump($emp3->notHere);
?>








