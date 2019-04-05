<?php 
session_start();
	require_once('dbconfig/config.php');
	if($_SESSION["username"]!=true)
	{
		header('location:index1.php');
	}
	if(($_POST['Roomates']==2 || $_POST['Roomates']==3 || $_POST['Roomates']==4) AND ($_POST['Floor']==3 || $_POST['Floor']==4 || $_POST['Floor']==5 || $_POST['Floor']==6))
	{
		if($_SESSION["username"]==true)
		{
			if(isset($_POST['submit']))
			{
				$_SESSION['roomates']=$_POST['Roomates'];
				$_SESSION['floor']=$_POST['Floor'];
				$username1=$_SESSION['username'];
				$roomates=$_POST['Roomates'];
				$type=$_POST['Type'];
				$floor=$_POST['Floor'];
				$branch=$_POST['Branch'];
				$mess=$_POST['Mess'];
				$query_update="UPDATE user1 SET roomates='$roomates',type='$type',floor='$floor',branch='$branch',mess='$mess' WHERE username='$_SESSION[username]'";
				$query_update_run = mysqli_query($con,$query_update);
				if($query_update_run)
				{
					echo '<script type="text/javascript">alert("data inserted")</script>';
				}
				else
				{
					echo '<script type="text/javascript">alert("query didnt run")</script>';
				}
			}
		}
		else
		{
			header('location:index1.php'); 	
		}
	}
	else
	{
		$_SESSION['w']=1;
		header('location:ca1.php');
	}
	if(isset($_POST['submit']) AND $_SESSION['w']!=1)
	{
		header('location:registration.php');
	}
?>