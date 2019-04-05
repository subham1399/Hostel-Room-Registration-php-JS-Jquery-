<?php
	session_start();
	require_once('dbconfig/config.php');
	if($_SESSION["username"]!=true)
	{
		header('location:index1.php');
	}
	$_SESSION['n1']=0;
	$_SESSION['n2']=0;
	$_SESSION['n3']=0;
	$_SESSION['a1']=-1;
	$_SESSION['a2']=-1;
	$_SESSION['a3']=-1;
	$_SESSION['w']=0;
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, html {
    height: 100%;
    font-family: Arial, Helvetica, sans-serif;
}
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}

* {
    box-sizing: border-box;
}

.bg-img {
    /* The image used */
    background-image: url("s.png");

    min-height: 380px;

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}

/* Add styles to the form container */
.container {
    position: absolute;
    right: 0;
    margin: 20px;
    max-width: 300px;
    padding: 16px;
    background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Set a style for the submit button */
.btn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.btn:hover {
    opacity: 1;
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
    color: #f1f1f1;
}
* {
    box-sizing: border-box;
}

.openBtn {
    background: #f1f1f1;
    border: none;
    padding: 10px 15px;
    font-size: 20px;
    cursor: pointer;
}

.openBtn:hover {
    background: #bbb;
}

.overlay {
    height: 100%;
    width: 100%;
    display: none;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.9);
}

.overlay-content {
    position: relative;
    top: 46%;
    width: 80%;
    text-align: center;
    margin-top: 30px;
    margin: auto;
}

.overlay .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
    cursor: pointer;
    color: white;
}

.overlay .closebtn:hover {
    color: #ccc;
}

.overlay input[type=text] {
    padding: 15px;
    font-size: 17px;
    border: none;
    float: left;
    width: 80%;
    background: white;
}

.overlay input[type=text]:hover {
    background: #f1f1f1;
}

.overlay button {
    float: left;
    width: 20%;
    padding: 15px;
    background: #ddd;
    font-size: 17px;
    border: none;
    cursor: pointer;
}

.overlay button:hover {
    background: #bbb;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
body {
  margin: 0;
  background-color: #f1f1f1;
  font-family: Arial, Helvetica, sans-serif;
    background-image:url(book.jpg);
}

#navbar {
  background-color: #333;
  position: fixed;
  top: -50px;
  width: 100%;
  display: block;
  transition: top 0.3s;
  background-image:url(soli.png);
}

#navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 15px;
  text-decoration: none;
  font-size: 17px;
}


.icon-bar {
  position: fixed;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
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
  background-color: #ddd;
  color: black;
}
#login{
margin: 25px 25px 25px 250px;
border:20px 20px 20px 20px;
resize: vertical;
overflow: auto;
padding:10px;
}
body {
  font-family: Arial, Helvetica, sans-serif;
}

.flip-box {
  background-color: transparent;
  width: 300px;
  height: 200px;
  border: 1px solid #f1f1f1;
  perspective: 1000px;
}

.flip-box-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

.flip-box:hover .flip-box-inner {
  transform: rotateX(180deg);
}

.flip-box-front, .flip-box-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

.flip-box-front {
  background-color: #bbb;
  color: black;
}

.flip-box-back {
  background-color: dodgerblue;
  color: white;
  transform: rotateX(180deg);
}
</style>
</head>
<body>
<div id="navbar">
<h2>Hostel Room Registration</h2>
<h4><p id="demo"></p></h4>
  <?php echo '<b>User:';
      echo $_SESSION['username'];
echo '</b>';	  ?>
 
</div>
<br><br><br><br><br><br><br>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="About.html">About</a>
  <a href="logout.php">Logout</a>
  <a href="pricing1234.html">View Prices</a>
  <a href="room.html">View Rooms </a>
     <a href="contact.html">Contact</a>
</div>

<div align="center">
<div id="myOverlay" class="overlay">
  <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
  <div class="overlay-content">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
<button class="openBtn" onclick="openSearch()">Open Search Box</button>
<br><br>
</div>
<div class="bg-img">
<div align="center">
  <form action="submit.php" class="container" method="post">
    <h1>Choices</h1>

    <label for="e"><b>Enter Branch </b></label>
	<input type="text" placeholder="Enter your branch" name="Branch" required>

    <label for="psw"><b>Enter AC or NON-AC</b></label>
    <input type="text" placeholder="Enter AC or NON-AC" name="Type" required>
	
	<label for="ps"><b>Enter Floor no.</b></label><br>
    <input type="text" placeholder="Enter the floor" name="Floor" required>
	 
	 	<label for="ps"><b>Enter Mess</b></label><br>
    <input type="text" placeholder="Enter Mess" name="Mess" required>
	
		<label for="ps"><b>Enter no. of Roomates</b></label><br>
    <input type="text" placeholder="Enter no. of Roomates" name="Roomates" required>

    <button type="submit" class="btn" name="submit">Submit</button>
  </form>
</div>
</div>
<script>
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-50px";
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
</script>
</html>
