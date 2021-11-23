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

$emp_query= "SELECT *, IFNULL(Department_id,'N/A') as dpt FROM Employee";
$personal_query = "SELECT *, concat(fname, ' ', middle_init, '.', ' ', lname) as name, IFNULL(degree_focus,'N/A') as deg From Personal";
$admin_query = "SELECT * FROM Administration";
$club_query = "SELECT * FROM Clubs";
$dept_query = "SELECT * FROM Department";
$district_query = "SELECT * FROM District";
$school_query = "SELECT *, IFNULL(District_id, 'N/A') as dst FROM School_Uni";
$teacher_query = "SELECT * FROM Teachers";

?>


<hr>
	
<?php
$result = mysqli_query($conn, $admin_query)
or die(mysqli_error($conn));
print "<h3> Administration Table </h3>";
print  "<table>";
print  "<tr> <th style='text-decoration:underline'>Admin Position</th> 
		<th style='text-decoration:underline'>essn </th> 
		<th style='text-decoration:underline'>School/Uni ID </th> 
		<th style='text-decoration:underline'>Start Date</th> </tr>";

while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {

    print "<tr>";
    print "<th>$row[Admin_position]\t</th> <th>$row[essn]\t</th> <th>$row[School_Uni_id]\t</th> <th>$row[start_date]\t</th>";
    print "</tr>";
  }
print "</table>";
print "<hr>";
mysqli_free_result($result);

#-----------------------------------

$result = mysqli_query($conn, $club_query)
or die(mysqli_error($conn));
print "<h3> Clubs Table </h3>";
print  "<table>";
print  "<tr> <th style='text-decoration:underline'>Club Name</th> 
		<th style='text-decoration:underline'>Club Email </th> 
		<th style='text-decoration:underline'>School/Uni ID </th> 
		<th style='text-decoration:underline'>Club Advisor</th> </tr>";

while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {

    print "<tr>";
    print "<th>$row[Club_name]\t</th> <th>$row[Club_email]\t</th> <th>$row[School_id]\t</th> <th>$row[club_advisor]\t</th>";
    print "</tr>";
  }
print "</table>";
print "<hr>";
mysqli_free_result($result);

#-----------------------------------

$result = mysqli_query($conn, $dept_query)
or die(mysqli_error($conn));
print "<h3> Department Table </h3>";
print  "<table>";
print  "<tr> <th style='text-decoration:underline'>Department ID</th> 
		<th style='text-decoration:underline'>Department Name </th>";

while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {

    print "<tr>";
    print "<th>$row[Department_id]\t</th> <th>$row[dep_name]\t</th>";
    print "</tr>";
  }
print "</table>";
print "<hr>";
mysqli_free_result($result);

#-----------------------------------

$result = mysqli_query($conn, $district_query)
or die(mysqli_error($conn));
print "<h3> District Table </h3>";
print  "<table>";
print  "<tr> <th style='text-decoration:underline'>District ID</th> 
		<th style='text-decoration:underline'>District Name </th>";

while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {

    print "<tr>";
    print "<th>$row[District_id]\t</th> <th>$row[District_name]\t</th>";
    print "</tr>";
  }
print "</table>";
print "<hr>";
mysqli_free_result($result);

#-----------------------------------

$result = mysqli_query($conn, $emp_query)
or die(mysqli_error($conn));
print "<h3> Employee Table </h3>";
print  "<table>";
print  "<tr> <th style='text-decoration:underline'> essn</th> 
		<th style='text-decoration:underline'>School/Uni ID </th>
		<th style='text-decoration:underline'>Email </th> 
		<th style='text-decoration:underline'>Department ID </th> 
		<th style='text-decoration:underline'>Salary</th> </tr>";

while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {

    print "<tr>";
    print "<th>$row[essn]\t</th> <th>$row[School_Uni_id]\t</th> <th>$row[email]\t</th>
    <th>$row[dpt]\t</th> <th>$$row[salary]\t</th>";
    print "</tr>";
  }
print "</table>";
print "<hr>";
mysqli_free_result($result);

#-----------------------------------

$result = mysqli_query($conn, $personal_query)
or die(mysqli_error($conn));
print "<h3> Personal Table </h3>";
print  "<table>";
print  "<tr> <th style='text-decoration:underline'> SSN</th> 
		<th style='text-decoration:underline'>Birthdate </th>
		<th style='text-decoration:underline'>Name </th> 
		<th style='text-decoration:underline'>Degree </th> 
		</tr>";

while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {

    print "<tr>";
    print "<th>$row[ssn]\t</th> <th>$row[birthdate]\t</th> <th>$row[name]\t</th>
    <th>$row[deg]\t</th>";
    print "</tr>";
  }
print "</table>";
print "<hr>";
mysqli_free_result($result);

#-----------------------------------

$result = mysqli_query($conn, $school_query)
or die(mysqli_error($conn));
print "<h3> School/Uni Table </h3>";
print  "<table>";
print  "<tr> <th style='text-decoration:underline'> School ID</th> 
		<th style='text-decoration:underline'>School Name </th>
		<th style='text-decoration:underline'>District ID </th> 
		<th style='text-decoration:underline'>Year Founded </th> 
		</tr>";

while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {

    print "<tr>";
    print "<th>$row[School_id]\t</th> <th>$row[School_name]\t</th> <th>$row[dst]\t</th>
    <th>$row[year_founded]\t</th>";
    print "</tr>";
  }
print "</table>";
print "<hr>";
mysqli_free_result($result);

#-----------------------------------

$result = mysqli_query($conn, $teacher_query)
or die(mysqli_error($conn));
print "<h3> Teachers Table </h3>";
print  "<table>";
print  "<tr> <th style='text-decoration:underline'> Start Date</th> 
		<th style='text-decoration:underline'>School ID </th>
		<th style='text-decoration:underline'>ESSN </th> 
		</tr>";

while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
  {

    print "<tr>";
    print "<th>$row[start_date]\t</th> <th>$row[School_Uni_id]\t</th> <th>$row[essn]\t</th>";
    print "</tr>";
  }
print "</table>";
print "<hr>";
mysqli_free_result($result);

mysqli_close($conn);

?>


</body>

<div style="border: 0.5px solid black;
	width: 100%;
	color: black;
	background: #64b8f4;
	position: relative;
	bottom:0;
	height: 40px;
	margin-top: 40px;">
<p>
<a href="GetTables.txt" >Contents</a>
of the PHP page that gets called.</p>
</div>
</html>
	  