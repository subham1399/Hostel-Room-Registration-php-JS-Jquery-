<?php
session_start();
require_once('dbconfig/config.php');
if($_SESSION['s']==0)
{
	header('location:index1.php');
}
if($_SESSION['s']==1)
{
	$_SESSION['s']=0;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Success</title>
</head>
<body>
<center><h1>Success</h1></center>
<a href="logout.php">Logout</a>
</body>
</html>