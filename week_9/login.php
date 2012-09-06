<?php
require_once("user.php");
session_start();

$user = User::checkLogin($_POST['username'], $_POST['password']);

if($user)
{
	$_SESSION['logintry'] = false;
	$_SESSION['id'] = $user->id;
	header("Location: control.php");
}
else
{
	$_SESSION['logintry'] = true;
	header("Location: index.php");
}