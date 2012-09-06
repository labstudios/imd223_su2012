<?php
require_once("user.php");
session_start();

if(!empty($_SESSION['id']))
{
	$user = new User($_SESSION['id']);
}
else
{
	header("Location: index.php");
}