<p style="font-size:1.5em">
<?php

function preout($data)
{
	/*echo "<pre>";
	print_r($data);
	echo "</pre>";*/
	echo "<pre>".print_r($data, true)."</pre>";
}

$arr = array();
$arr['name'] = "Bob Hendrix";
$arr['job'] = "Janitor";

foreach($arr as $k => $v)
{
	echo $k." ".$v."<br />";
}

$obj = (Object) $arr;
foreach($obj as $k => $v)
{
	echo $k." ".$v."<br />";
}
 
preout($arr);
preout($obj);

echo $obj->name." ".$obj->job;

$ob2 = new stdClass();
$ob2->price = 15.32;
$ob2->item = "shoes";
$ob2->size = 9;
preout($ob2);
?>