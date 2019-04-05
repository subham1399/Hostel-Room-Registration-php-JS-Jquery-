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
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Search Page</title>
	<style type="text/css">
	.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}
.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
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
<form action="search.php" method="post">
      <input type="text" placeholder="Search Roomates.." name="search">
      <button type="submit" name="SEARCH"><i class="fa fa-search"></i></button>
</form>
<form action="registration.php" method="post">
<?php
$_SESSION['a3']=3;
    //$query = $_POST['search']; 
    // gets value sent over search form
    $min_length = 3;
    // you can set minimum length of the query if you want
    $query1 = "select * from user1 where username='$_SESSION[username]' ";
	$query_run = mysqli_query($con,$query1);
	$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
	$rank=$row['rank'];
    // if query length is more or equal minimum length then
         
    //    $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        //$query = mysqli_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysqli_query($con,"SELECT * FROM user1 WHERE (`rank`<('$rank'+100)) AND (`rank`>('$rank'-100)) AND (`regfloor`=0)") or die(mysqli_error());
             
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
?>
</form>
</table>
</body>
</html>