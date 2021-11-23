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

  <hr>
  
  
<?php
  
$fname = $_POST['first'];
$lname = $_POST['last'];


$fname = mysqli_real_escape_string($conn, $fname);
$lname = mysqli_real_escape_string($conn, $lname);
// this is a small attempt to avoid SQL injection
// better to use prepared statements

$query = "SELECT email, IFNULL(dep_name, 'N/A') as dep
from Employee join Personal on (ssn=essn) Join Department using(Department_id)
Where fname=";
$query = $query."'".$fname."'"." And lname='".$lname."'";

?>

<p>
The query:
<p>
<?php
print $query;
?>
<hr>
<p>
Result of query:
<p>
	
<?php
$result = mysqli_query($conn, $query)
or die(mysqli_error($conn));

print  "<table>";
print  "<tr> 
			<th style='text-decoration:underline'>Email</th> 
			<th style='text-decoration:underline'>Department</th>
		</tr>";

while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {

    print "<tr>";
    print "<th>$row[email]\t</th>
    		<th>$row[dep]</th>";
    print "</tr>";
  }
print "</table>";

mysqli_free_result($result);

mysqli_close($conn);

?>

<p>
	<div style="border: 0.5px solid black;
	width: 100%;
	color: black;
	background: #64b8f4;
	position: absolute;
	bottom:0;
	height: 40px;
	margin-top: 40px;">
<p>
<a href="FindTeacher.txt" >Contents</a>
of the PHP page that gets called.</p>
</div>

</body>
</html>
	  