<?php
    session_start();
	require_once('dbconfig/config.php');
	if($_SESSION["username"]!=true)
	{
		header('location:index1.php');
	}
	if($_SESSION['e']==1)
	{
		echo '<script type="text/javascript">alert("Please choose distinct roomates")</script>';
		$_SESSION['e']=0;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="registration.css" rel="stylesheet" type="text/css"> 
<style>
@charset "utf-8";
/* CSS Document */
body, html {
    height: 100%;
    font-family:Arial, Helvetica, sans-serif;
}

#reg{
	font-family:Arial, Helvetica, sans-serif;
	color: antiquewhite;
	align-items: center;
	font-size: 30px;
	
}
.container {
    position: absolute;
    right: 0;
    margin: 20px;
    max-width: 300px;
    padding: 16px;
    background-color: white;
}
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}
.sidenav a:hover {
    color:blue;
}

.sidenav .closebtn {
    position: absolute;
    top: 10px;
    right: 45px;
    font-size: 36px;
    margin-left: 50px;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background:url(book.jpg);
}
#navbar {
  background:#2A3132;
  opacity:1; 
  position:fixed;
  top: -55px;
  width: 100%;
  display:block;
  transition: top 0.5s;
  border-radius:10px;
  
}
#navbar a {
  float:left;
  display:inline-block;
  color: #f2f2f2;
  text-align: center;
  padding: 10px;
  text-decoration: none;
  font-size: 20px;
}
.icon-bar {
	position: absolute;
	top: 366px;
	-webkit-transform: translateY(35px);
	-ms-transform: translateY(35px);
	transform: translateY(35px);
	left: 0px;
}
.icon-bar a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}
.icon-bar a:hover {
  background-color: #000;
}
.facebook {
  background: #3B5998;
  color: white;
}
.twitter {
  background: #55ACEE;
  color: white;
}
.google {
  background: #dd4b39;
  color: white;
}
.linkedin {
  background: #007bb5;
  color: white;
}
.btn {
    background-color: dodgerblue;
    color: white;
    padding: 15px 15px;
    border: none;
    cursor: pointer;
    width: 80%;
    opacity: 0.9;
}
.btn:hover {
    opacity: 1;
}
.youtube {
  background: #bb0000;
  color: white;
}
#navbar a:hover {
  background-color:blue;
  color: black;
}
body {
  font-family: Arial, Helvetica, sans-serif;
}

input[type=text]{
    width: 150px;
    box-sizing:content-box;
    border: 2px solid #2A3132;
    border-radius: 5px;
    font-size: 15px;
    background-color: whi;
    background-position: 20px 20px 10px 10px; 
    background-repeat: no-repeat;
    padding:5px;
    -webkit-transition: width 0.3s ease-in-out;
    transition: width 0.3s ease-in-out;
}

input[type=text]:focus {
    width: 300px;
	opacity:1;
	
}

input:hover{
	background-color:#763626;
	opacity: 0.5;
}

form{
	padding: 50px 40px;
	margin: 30px 100px;
	border-radius:10px;
	background-color:#CABEB9;
	opacity: 0.93;
}

input[type=submit]{
	width:50px;
	height:10px;
	background-color:#90AFC5;
	border-color:cadetblue;
	border:thick;
	font-size: 25px;
	font-family: Arial, Helvetica, sans-serif;
}

#btn_next{
	width:150px;
	height:50px;
	background-color:#6A615B;
	border-color:cadetblue;
	border:10px;
	font-size: 25px;
	font-family: Arial, Helvetica, sans-serif;
    border-radius:8px;
}

#btn_next:hover{
	background-color:#763626;
	opacity: 0.5;
	
}

</style>
<title>Registration</title>
</head>
<body>
<div id="navbar">
<br><h2 id="reg" align="center">HOSTEL ROOM REGISTRATION</h2>
  <h4><p id="demo"></p></h4>
  <?php 
echo '<p style="color:antiquewhite;font-family: Arial, Helvetica, sans-serif;font-size:25px" align="center">';
echo 'User:';
echo $_SESSION["username"];
echo '</p>' 
?>
</div>

<p><br>
  <br>
</p>
<p>&nbsp;</p>
<br>
<br>
<p><span style="font-size:40px;cursor:pointer" onclick="openNav()">&#9776;</span></p>
<p> </p>
<div id="mySidenav" class="sidenav">
  <p><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="About.html">About</a>
    <a href="logout.php">Logout</a>
    <a href="pricing1234.html">View Prices</a>
    <a href="room.html">View Rooms </a>
    <a href="contact.html">Contact</a></p>
</div>

<div align="left">
<form action="roomsavailable.php" name="regform" method="post">
<p style="color:antiquewhite;font-family: Arial, Helvetica, sans-serif;font-size:25px" align="center">
Please enter the following deatils to further move with registration.<br>REGISTRATION</p>
ENTER THE REGISTER NUMBER OF 1ST ROOMMATE:<br>
<?php echo'<input type="text" name="you" value="'.$_SESSION['username'].'" placeholder="your reg. no." id="room1" required><br>'; ?>
<br>
ENTER THE REGISTER NUMBER OF 2ND ROOMMATE:  <a href="search1.php"><button type="button" style="width:75px;
	height:25px;background-color:#6A615B;border-radius:5px">ADD</button></a><br>
<?php if($_SESSION['a1']==-1)
{
	$_SESSION['result1']=NULL;
}
	if($_SESSION['a1']==1)
	{
		$_SESSION['result1']=$_POST['result'];
		$_SESSION['a1']=0;
	}
	echo'<input type="text" name="second" value="'.$_SESSION['result1'].'" placeholder="reg. no. of 2nd roommate" id="room2" required><br>'; 
?>
<br>
<?php
if($_SESSION['n1']==0)
{
	if(($_SESSION['roomates']==3) || ($_SESSION['roomates']==4))
	{
$_SESSION['Roomates3']=$_SESSION['roomates'];
$_SESSION['n1']=1;
	}
}
if($_SESSION['n1']==1)
{
	if(($_SESSION['Roomates3']==3) || ($_SESSION['Roomates3']==4))
	{
		echo 'ENTER THE REGISTER NUMBER OF 3RD ROOMMATE:   <a href="search2.php"><button type="button" style="width:75px;
	height:25px;background-color:#6A615B;border-radius:5px">ADD</button></a><br>';
	}
}
?>
<?php if($_SESSION['a2']==-1)
{
	$_SESSION['result2']=NULL;
}
	if($_SESSION['a2']==2)
	{
		$_SESSION['result2']=$_POST['result'];
		$_SESSION['a2']=0;
	}
	if($_SESSION['n1']==1)
	{
		if(($_SESSION['Roomates3']==3) || ($_SESSION['Roomates3']==4))
		{
	echo'<input type="text" name="third" value="'.$_SESSION['result2'].'" placeholder="reg. no. of 3rd roommate" id="room3" required><br>';
		}
	}
?>	
<br>
<?php
if($_SESSION['n2']==0)
{
	if(($_SESSION['roomates']==4))
	{
$_SESSION['Roomates4']=$_SESSION['roomates'];
$_SESSION['n2']=1;
	}
}
if($_SESSION['n2']==1)
{
	if(($_SESSION['Roomates4']==4))
	{
		echo 'ENTER THE REGISTER NUMBER OF 4TH ROOMMATE:   <a href="search3.php"><button type="button" style="width:75px;
	height:25px;background-color:#6A615B;border-radius:5px;">ADD</button></a><br>';
	}
}
?>
<?php if($_SESSION['a3']==-1)
{
	$_SESSION['result3']=NULL;
} 
	if($_SESSION['a3']==3)
	{
		$_SESSION['result3']=$_POST['result'];
		$_SESSION['a3']=0;
	}
	if($_SESSION['n2']==1)
	{
		if(($_SESSION['Roomates4']==4))
		{
	echo'<input type="text" name="fourth" value="'.$_SESSION['result3'].'" placeholder="reg. no. of 4th rommate" id="room4" required><br>';
		}
	}
?>
<br>
<div align="center">
<button type="submit" id="btn_next" name="next">
NEXT</button>
</div>
</form>
</div>
<script>	
	window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-40px";
  }
}
</script>
<script>
var myVar = setInterval(myTimer, 1000);
function myTimer() {
    var d = new Date();
    document.getElementById("demo").innerHTML = d.toLocaleTimeString();
}
</script>
<script>
function openSearch() {
    document.getElementById("myOverlay").style.display = "block";
}
function closeSearch() {
    document.getElementById("myOverlay").style.display = "none";
}
</script>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
var c=document.getElementById('number').value;
</script>
</body>
</html>
