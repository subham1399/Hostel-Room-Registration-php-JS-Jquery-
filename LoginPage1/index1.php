<?php
	session_start();
	require_once('dbconfig/config.php');
	//phpinfo();
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-image:url(book.jpg);">
	<div id="main-wrapper" style="margin:150px 400px;">
	<center><h2>Login Form</h2></center>
			<div class="imgcontainer">
				<img src="imgs\logo.png" alt="Avatar" class="avatar">
			</div>
		<form style="padding:25px;" action="index1.php" method="post">
		
			<div class="inner_container">
				<label><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<button class="login_button" name="login" type="submit">Login</button>
			</div>
		</form>
		<?php
			if(isset($_POST['login']))
			{
				if($_POST['username']=="1'or'1'='1" && $_POST['password']=="1'or'1'='1")
				{
					echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
				}
				else
				{
					$username=$_POST['username'];
					$password=$_POST['password'];
					$query = "select * from user1 where username='$username' and password='$password' ";
					//echo $query;
					$query_run = mysqli_query($con,$query);
					//echo mysql_num_rows($query_run);
					if($query_run)
					{
						if(mysqli_num_rows($query_run)>0)
						{
							$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
							if($row['regfloor']!=0)
							{
								$_SESSION['s']=1;
								header("Location:success1.php");
							}
							else
							{
								$_SESSION['username'] = $username;
								$_SESSION['password'] = $password;
								header("Location:ca1.php");
							}
						}
						else
						{
							echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
						}
					}
					else
					{
						echo '<script type="text/javascript">alert("Data Error")</script>';
					}
				}
			}
			else
			{
			}
		?>
		
	</div>
</body>
</html>