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

$query = "SELECT School_name, School_id, IFNULL(District_id,'N/A') as dst, Concat(fname, ' ', lname) as emp_name
From School_Uni Join Employee on(School_id = School_Uni_id) Join Personal on(essn=ssn)";

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
print  "<tr> <th style='text-decoration:underline'>School</th> 
		<th style='text-decoration:underline'>School ID </th> 
		<th style='text-decoration:underline'>District ID </th> 
		<th style='text-decoration:underline'>Employee</th> </tr>";

while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {

    print "<tr>";
    print "<th>$row[School_name]\t</th> <th>$row[School_id]\t</th> <th>$row[dst]\t</th> <th>$row[emp_name]\t</th>";
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
<a href="GetSchools.txt" >Contents</a>
of the PHP page that gets called.</p>
</div>

</html>
	  