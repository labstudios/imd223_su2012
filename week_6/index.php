<?php
require_once("connect.php");

$result = $db->query("SELECT * FROM `employees` LIMIT 0,30");

if($db->errno)
{
	die("The last query had this problem: ".$db->error);
}
?>
<h3>All our users:</h3>
<?php
while($row = $result->fetch_object())
{
	echo "$row->first_name<br />";
}

$username = "richman";

$loggedinResult = $db->query("SELECT * FROM `employees` WHERE `user_name` = '$username';");

if($loggedinResult)
{
	$user = $loggedinResult->fetch_object();
	echo "<p>Hello, $user->first_name! Thanks for visiting!</p>";
}

//preout($result);
?>















