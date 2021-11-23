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

$date = $_POST['start_date'];

$date = mysqli_real_escape_string($conn, $date);
// this is a small attempt to avoid SQL injection
// better to use prepared statements

$query = "SELECT concat(fname, ' ', middle_init, '. ', lname) as fullname, email, School_name, start_date
FROM (Employee emp JOIN Personal prsn on(emp.essn=prsn.ssn) join Teachers ts using(essn))
JOIN School_Uni sch on(sch.School_id=ts.School_Uni_id)
WHERE start_date between '0000-00-00' and ";
$query = $query."'".$date."'"." Group by lname";

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
		<th style='text-decoration:underline'>School/Uni</th>
		<th style='text-decoration:underline'>Start Date</th> </tr>";

while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {

    print "<tr>";
    print "<th>$row[fullname]\t</th> <th>$row[email]\t</th> <th>$row[School_name]\t</th>
    <th>$row[start_date]\t</th>";
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
<a href="FindStartDate.txt" >Contents</a>
of the PHP page that gets called.</p>
</div>

</html>
	  