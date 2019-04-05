<?php
	session_start();
	require_once('dbconfig/config.php');
	if($_SESSION["username"]!=true)
	{
		header('location:hacker.html');
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
<th>Registration number</th>
<th>Branch</th>
<th>Room type</th>
<th>Rank</th>
</tr>
<form action="registration.php" method="post">
<?php
	$query1 = "select * from user1 where username='$_SESSION[username]' ";
	$query_run = mysqli_query($con,$query1);
	$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
	$rank=$row['rank'];
    $query = $_POST['search']; 
    // gets value sent over search form
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        //$query = mysqli_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysqli_query($con,"SELECT * FROM user1 WHERE ((`username`='$query') OR (`branch`='$query')) AND ((`rank`<('$rank'+100)) AND (`rank`>('$rank'-100)) AND (`regfloor`=0))") or die(mysqli_error());
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                echo "<tr>";
				echo '<td><button class="login_button" name="result" type="submit" value="'.$results['username'].'">'.$results['username'].'</button></td>';
				echo '<td>'.$results['branch'].'</td>';
				echo '<td>'.$results['roomates'].'</td>';
				echo '<td>'.$results['rank'].'</td>';
				echo "</tr>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
			echo "</table>";
             
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }
?>
</form>
</table>
</body>
</html>