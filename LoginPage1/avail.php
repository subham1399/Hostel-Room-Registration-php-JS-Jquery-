<?php
	session_start();
	require_once('dbconfig/config.php');
	if($_SESSION["username"]!=true)
	{
		header('location:index1.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Page</title>
	<style type="text/css">
table{
	border-collape: collapse;
	width: 100%;
	color: #d96459;
	font-family: monospace;
	font-size: 25px;
	text-align: left;
}
th{
	background-color: #d96459;
	color: white;
}
td{
	text-align: center;
}
</style>
</head>
<body>
<table>
<tr>
<th></th>
<th></th>
<th></th>
</tr>
<form action="success.php" method="post">
<?php
echo '<a href="ca1.php">Choices page</a>';
$roomn=$_SESSION['floor'];
$roomn = htmlspecialchars($roomn); 
$query="select * from rt where occupied=0 and roominitial='$roomn' ";
$query_run = mysqli_query($con,$query);
$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
if(mysqli_num_rows($query_run)>0)
{
while($row1=mysqli_fetch_array($query_run))
{
	echo "<tr>";
	echo '<td><button class="login_button" name="room" type="submit" value="'.$row1['room'].'">'.$row1['room'].'</button></td>';
	echo "<tr>";
}
}
else
{
	echo "No rooms available on this floor. please go to back and refill the floor choice";
}
?>
</form>
</table>
</body>
</html>
	