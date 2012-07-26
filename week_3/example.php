<?php
require_once("employee.php");

$emp1 = new Employee("bob michaels", "rock star", "22320.73");
$emp2 = new Employee("fred richards", "accountant", 87813.2253);
$emp3 = new HourlyEmployee("george franklin", "sandwich artist", 12.30);
Employee::listEmployees();

$emp3->clockIn();
sleep(15);
$emp3->clockOut();
?>