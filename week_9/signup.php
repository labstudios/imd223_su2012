<?php
	require_once("user.php");
	session_start();
?>
<pre>
<?php
/*
	$key = "Tbnds93rbYaherg7";
	require_once("database.php");
	$db = new Database();
	$data = new StdClass();
	$data->username = $db->sanitize($_POST['username']);
	$data->password = sha1($key.$_POST['password']);
	$db->insert("users", $data, false);
*/
	
	$user = new User();
	$user->username = $_POST['username'];
	$user->password = $_POST['password'];
	$user->save();
	
	$_SESSION['id'] = $user->id;
?>
</pre>




