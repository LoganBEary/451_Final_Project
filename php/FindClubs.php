<?php

include('connectionData.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die('Error connecting to MySQL server.');

?>

<html>
<head>
<link href="../css/tables.css" rel="stylesheet">  
  <title>Another Simple PHP-MySQL Program</title>
  </head>
  
  <body bgcolor="grey">

  
  
<?php
  
$club = $_POST['clubs'];


$club = mysqli_real_escape_string($conn, $club);
// this is a small attempt to avoid SQL injection
// better to use prepared statements

$query = "SELECT Club_name, Club_email, club_advisor, School_name
From Clubs c join School_Uni sc using(School_id)
Where sc.District_id is NULL";

?>

<p>
The query:
<p>
<?php
print $query;
?>

<hr>
	
<?php
$result = mysqli_query($conn, $query)
or die(mysqli_error($conn));

print  "<table>";
print  "<tr> <th style='text-decoration:underline'>Club Name</th> 
		<th style='text-decoration:underline'>Club Email </th> 
		<th style='text-decoration:underline'>Club Advisor </th> 
		<th style='text-decoration:underline'>School</th> </tr>";

while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {

    print "<tr>";
    print "<th>$row[Club_name]\t</th> <th>$row[Club_email]\t</th> <th>$row[club_advisor]\t</th> <th>$row[School_name]\t</th>";
    print "</tr>";
  }
print "</table>";

mysqli_free_result($result);

mysqli_close($conn);

?>

<div style="border: 0.5px solid black;
	width: 100%;
	color: black;
	background: #64b8f4;
	position: absolute;
	bottom:0;
	height: 40px;
	margin-top: 40px;">
<p>
<a href="FindClubs.txt" >Contents</a>
of the PHP page that gets called.</p>
</div>



</body>
</html>
	  