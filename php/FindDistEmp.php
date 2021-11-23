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

$district = $_POST['district'];

$district = mysqli_real_escape_string($conn, $district);
// this is a small attempt to avoid SQL injection
// better to use prepared statements

$query = "SELECT concat(fname, ' ', middle_init, '. ', lname) as fullname, birthdate, degree_focus
FROM District join School_Uni using(District_id) Join Employee on(School_Uni_id = School_id)
Join Personal on(essn=ssn) 
Where District_name =";
$query = $query."'".$district."'";

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
		<th style='text-decoration:underline'>Birthday</th>
		<th style='text-decoration:underline'>Degree</th> </tr>";

while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {

    print "<tr>";
    print "<th>$row[fullname]\t</th> <th>$row[birthdate]\t</th> <th>$row[degree_focus]\t</th>";
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
<a href="FindDistEmp.txt" >Contents</a>
of the PHP page that gets called.</p>
</div>

</html>
	  