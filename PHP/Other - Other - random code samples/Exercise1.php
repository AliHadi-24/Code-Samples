<?php
//1
if(isset($_SESSION['courseid']) == false){
	print "Not Set";
}

//2
if(isset($_SESSION['courseid']) == true){
	unset($_SESSION['locationid']);
}

//3
function CalculateMarks()
{
    $numargs = func_num_args();
    echo "Number of arguments: $numargs\n";
}

CalculateMarks(1, 2, 3);  

//4

//5
session_start();

//6

$conn = mysqli_connect()("MyServer","Jsmith","htimsj","wordpress")

//7
mysqli_fetch_array();


//8
/*
$query1= "Select count(*) AS Male from  student where StudentGender='M'";
$query2= "Select count(*) AS Female from  student where StudentGender='F'";
$query3="Select (Select count(*) AS Male from  student where StudentGender='M'),(Select count(*) AS Female from  student where StudentGender='F') ";
*/
$sql = "select * from student";
$result = mysqli_query($conn, $sql);

$queryMaleFemale="Select (Select count(*) AS Male from  student where StudentGender='M'),(Select count(*) AS Female from  student where StudentGender='F') ";
$result2 = mysqli_query($conn, $queryMaleFemale);

print "<table border='1'>";
print "<caption style='color: red; font-size: 1.5em;'>Students List</caption>";
print "<tr>";
print "<td>Student ID</td>";
print "<td>Student Name</td>";
print "<td>Student Gender</td>";
print "<td>Total Female</td>";
print "<td>Total Male</td>";
print "</tr>";

while ($row = mysqli_fetch_array($result))
{
	print "<tr>";
	print "<td>$row[0]</td>";
	print "<td>$row[1]</td>";
	print "<td>$row[2]</td>";
	print "</tr>";
}


while ($row = mysqli_fetch_array($result2))
{
	print "<tr>";
	print "<td>$row[0]</td>";
	print "<td>$row[1]</td>";
	print "</tr>";
}



print "</table" ;
}


?>