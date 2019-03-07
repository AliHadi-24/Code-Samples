<?php
session_start();
include "functions.php"	;
include "connection.php";
include "messages.php";

$courseid = $_POST['courseid'];
$coursename = $_POST['coursename'];
$courseloc = $_POST['courseloc'];
$locationid =  $_POST["location1"];

if (isset($_POST['Add']))
{
	$valid = validateInput($courseid);
	if (!$valid)
	{
		header("location:courseform.php?message=$messages[6]");
		exit();
	}

	$valid = validateInput($coursename);
	if (!$valid)
	{
		header("location:courseform.php?message=$messages[15]");
		exit();
	}


	$valid = validateInput($locationid);
	if (!$valid)
	{
		header("location:courseform.php?message=$messages[16]");
		exit();
	}
	
	
	$sql = "insert into course values(NULL, $coursename, $courseid);";
	$result = mysqli_query($conn, $sql);
	print "This Course Added";
}

print $locationid;
exit();

if (empty($courseid))
{
	print "Type in course id";
}
else
if (empty($coursename))
{
	print "Type in course name";
}
else
if (empty($courseloc))
{
	print "Type in course location";
}
$_SESSION['courseid'] = $courseid;
print "The course id = " . $courseid . "<br />";
print "The course name = " . $coursename . "<br />";
print "The course location = " . $courseloc . "<br />";
print "<a href='student.php'>Student</a>";
?>