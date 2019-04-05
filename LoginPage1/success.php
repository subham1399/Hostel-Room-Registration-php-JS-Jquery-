<?php
	session_start();
	require_once('dbconfig/config.php');
	if($_SESSION["username"]!=true)
	{
		header('location:index1.php');
	}
?>
<?php
if($_SESSION['username']==true)
{
	$_SESSION['n1']=0;
	$_SESSION['n2']=0;
	$_SESSION['n3']=0;
	$_SESSION['a1']=-1;
	$_SESSION['a2']=-1;
	$_SESSION['a3']=-1;
	$query_update="UPDATE rt SET occupied=1 WHERE room='$_POST[room]'";
	$query_update_run = mysqli_query($con,$query_update);
	$query_update1="UPDATE user1 SET regfloor='$_POST[room]' WHERE username='$_SESSION[username]'";
	$query_update_run1 = mysqli_query($con,$query_update1);
	$query_update2="UPDATE user1 SET regfloor='$_POST[room]' WHERE username='$_SESSION[result1]'";
	$query_update_run2 = mysqli_query($con,$query_update2);
	if($_SESSION['a2']==2)
	{
		$query_update3="UPDATE user1 SET regfloor='$_POST[room]' WHERE username='$_SESSION[result2]'";
	    $query_update_run3 = mysqli_query($con,$query_update3);
	}
	if($_SESSION['a3']==3)
	{
		$query_update4="UPDATE user1 SET regfloor='$_POST[room]' WHERE username='$_SESSION[result3]'";
	    $query_update_run4 = mysqli_query($con,$query_update4);
	}
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