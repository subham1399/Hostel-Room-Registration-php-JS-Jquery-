<?php
session_start();
require_once('dbconfig/config.php');
if($_SESSION["username"]!=true)
{
	header('location:index1.php');
}
if($_SESSION['roomates']==4)
{
	if($_POST['you']==$_POST['second'] || $_POST['you']==$_POST['third'] || $_POST['you']==$_POST['fourth'] || $_POST['second']==$_POST['third'] || $_POST['second']==$_POST['fourth'] || $_POST['third']==$_POST['fourth'])
	{
		$_SESSION['e']=1;
		echo '<script type="text/javascript">alert("Please choose distinct roomates")</script>';
		header('location:registration.php');
	}
}
else if($_SESSION['roomates']==3)
{
	if($_POST['you']==$_POST['second'] || $_POST['you']==$_POST['third'] || $_POST['second']==$_POST['third'])
	{
		$_SESSION['e']=1;
		echo '<script type="text/javascript">alert("Please choose distinct roomates")</script>';
		header('location:registration.php');
	}
}
else if($_SESSION['roomates']==2)
{
	if($_POST['you']==$_POST['second'])
	{
		$_SESSION['e']=1;
		echo '<script type="text/javascript">alert("Please choose distinct roomates")</script>';
		header('location:registration.php');
	}
}
if($_SESSION['e']==0)
{
	echo '<script type="text/javascript">alert("ok1")</script>';
	if($_SESSION['roomates']==2)
	{
		$_SESSION['r1']=$_POST['you'];
		$_SESSION['r2']=$_POST['second'];
	}
	if($_SESSION['roomates']==3)
	{
		$_SESSION['r1']=$_POST['you'];
		$_SESSION['r2']=$_POST['second'];
		$_SESSION['r3']=$_POST['third'];
	}
	if($_SESSION['roomates']==4)
	{
		$_SESSION['r1']=$_POST['you'];
		$_SESSION['r2']=$_POST['second'];
		$_SESSION['r3']=$_POST['third'];
		$_SESSION['r4']=$_POST['fourth'];
	}
	header('location:avail.php');
}
?>