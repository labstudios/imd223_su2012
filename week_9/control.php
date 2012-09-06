<?php
require_once("logincheck.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Control!!</title>
</head>
<body>
    <h3>Welcome, <?php echo $user->username;?></h3>
    <a href="logout.php">Logout</a>
</body>
</html>







