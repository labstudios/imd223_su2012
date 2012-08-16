<?php
function preout($data)
{
	echo "<pre>".print_r($data, true)."</pre>";
}

$db = new mysqli("localhost", "example2", "pass123", "example2");

if($db->connect_errno)
{
	die("<br /><br /><br /><strong>The database no worky.</strong> Here is why: ".$db->connect_error);
}
?>