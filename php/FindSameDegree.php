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

$degree = $_POST['degree'];

$degree = mysqli_real_escape_string($conn, $degree);
// this is a small attempt to avoid SQL injection
// better to use prepared statements

$query = "SELECT concat(fname, ' ', middle_init, '. ', lname) as fullname, email, School_name 
FROM Personal p JOIN Employee on(essn=ssn)
JOIN School_Uni sc on(School_Uni_id=School_id) 
Where degree_focus=";
$query = $query."'".$degree."'"." Group by p.lname";

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
print  "<tr> <th style='text-decoration:underline'>Name</th> 
		<th style='text-decoration:underline'>Email</th>
		<th style='text-decoration:underline'>School/Uni</th> </tr>";

while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {

    print "<tr>";
    print "<th>$row[fullname]\t</th> <th>$row[email]\t</th> <th>$row[School_name]\t</th>";
    print "</tr>";
  }
print "</table>";

mysqli_free_result($result);

mysqli_close($conn);

?>


</body>

<div style="border: 0.5px solid black;
	width: 100%;
	color: black;
	background: #64b8f4;
	position: absolute;
	bottom:0;
	height: 40px;
	margin-top: 40px;">
<p>
<a href="FindSameDegree.txt" >Contents</a>
of the PHP page that gets called.</p>
</div>

</html>
	  