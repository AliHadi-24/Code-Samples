<?php
session_start();
include "functions.php"	;
include "connection.php";
include "messages.php";
$studentId = $_POST['studentId'];
$studentName = $_POST['studentName'];
$studentEmail = $_POST['studentEmail'];
$studentDob = $_POST['studentDob'];
$courseId = $_POST['courseId'];
$_SESSION["studentId"] = $studentId;
$_SESSION["studentName"] = $studentName;
$_SESSION["studentEmail"] = $studentEmail;
$_SESSION["studentDob"] = $studentDob;
$_SESSION["courseId"] = $courseId;

if (isset($_POST['Add']))
{
	if (empty($studentId) == true)
	{
		//header("location:studentform.php?message=$messages[0]");
		//print "Student Id is required";
		header("location:studentform.php?message=$messages[0]");
		exit();
	}
	

	if (empty($studentName) == true)
	{
		//header("location:studentform.php?message=Student Name is required");
		//print "Student name is required";
		header("location:studentform.php?message=$messages[1]");
		exit();
	}

	if (empty($studentEmail) == true)
	{
		//header("location:studentform.php?message=Student Email is required");
		//print "Student email is required";
		header("location:studentform.php?message=$messages[2]");
		exit();
	}
	if (empty($studentDob) == true)
	{
		//header("location:studentform.php?message=Student Date of Birth is required");
		//print "Student dob is required";
		header("location:studentform.php?message=$messages[3]");
		exit();
	}

	if (empty($courseId) == true)
	{
		//header("location:studentform.php?message=Course ID is required");
		//print "Course id is required";
		header("location:studentform.php?message=$messages[4]");
		exit();
}


$sql = "insert into student values ($studentId, '$studentName', '$studentEmail', '$studentDob', $courseId)";
$result = mysqli_query($conn, $sql);
//header("location:studentform.php?message=Student Record Added");
//print "Student Record Added";
header("location:studentform.php?message=$messages[5]");
}

if(isset($_POST['delete']))
{
	
	$valid = validateInput($studentId);// calling the Function
	if ($valid == false){
		//header("location:studentform.php?message=Student Id is required");
		header("location:studentform.php?message=$messages[6]");
		exit();
	}
	
	$valid = validateInputLength($studentId);// calling the Function
	if ($valid == false){
		//header("location:studentform.php?message=Student ID Must Be Six Characters");
		//print "Student ID Must Be Six Characters";
		header("location:studentform.php?message=$messages[7]");
	}
	
	$sql = "delete from student where studenId = $studentId";
	$result = mysqli_query($conn, $sql);
	//header("location:studentform.php?message=Student Deleted");
	//print "Student Deleted";
	header("location:studentform.php?message=$messages[8]");
	
}else if (isset($_POST['update']))
{

	$valid = validateInput($studentId);// calling the Function
	if ($valid == false){
		//header("location:studentform.php?message=Student ID is required");
		//print "Student ID is required";
		header("location:studentform.php?message=$messages[9]");
		exit(); 
	}
	
	
	$valid = validateInput($studentName);// calling the Function
	if ($valid == false){
		//header("location:studentform.php?message=Student Name is required");
		//print "Student Name is required";
		header("location:studentform.php?message=$messages[10]");
		exit();
	}
	
	$valid = validateInput($studentEmail);// calling the Function
	if ($valid == false){
		//header("location:studentform.php?message=Student Email is required");
		//print "Student Email is required";
		header("location:studentform.php?message=$messages[11]");
		exit();
	}
	
	$valid = validateInput($studentDob);// calling the Function
	if ($valid == false){
		//header("location:studentform.php?message=Student Date Of Birth is required");
		//print "Student Dob is required";
		header("location:studentform.php?message=$messages[12]");
		exit();
	}
	
	$valid = validateInput($courseId);// calling the Function
	if ($valid == false){
		//header("location:studentform.php?message=Course ID is required");
		//print "Course ID is required";
		header("location:studentform.php?message=$messages[13]");
		exit();
	}
	
	$sql = "UPDATE student SET studentName = '$studentName',studentDob = $studentDob  WHERE studenId = $studentId";
	$result = mysqli_query($conn, $sql);
	//header("location:studentform.php?message=Student Updated is required");
	//print "Student Updated";
	header("location:studentform.php?message=$messages[14]");
}
else if (isset($_POST['viewAll']))
{
$sql = "select * from student";
$result = mysqli_query($conn, $sql);

print "<table border='1'>";
print "<caption style='color: red; font-size: 1.5em;'>Students List</caption>";
print "<tr style='color: blue; font-family: arial;'>";
print "<td>Student ID</td>";
print "<td>Student Name</td>";
print "<td>Student Email</td>";
print "<td>Student DOB</td>";
print "<td>Course ID</td>";
print "</tr>";

while ($row = mysqli_fetch_array($result))
{
	print "<tr>";
	print "<td>$row[0]</td>";
	print "<td>$row[1]</td>";
	print "<td>$row[2]</td>";
	print "<td>$row[3]</td>";
	print "<td><a href='courseformprocesing.php?courseId=$row[4]'>$row[4]</a></td>";
	print "</tr>";
}
print "</table" ;
}



else if(isset($_POST['search']))
{
	
$sql = "select * from student where studentId = $studentId";
$result = mysqli_query($conn, $sql);

print "<table border='1'>";
print "<caption style='color: red; font-size: 1.5em;'>Students List</caption>";
print "<tr style='color: blue; font-family: arial;'>";
print "<td>Student ID</td>";
print "<td>Student Name</td>";
print "<td>Student Email</td>";
print "<td>Student DOB</td>";
print "<td>Course ID</td>";
print "</tr>";

while ($row = mysqli_fetch_array($result))
{
	print "<tr>";
	print "<td>$row[0]</td>";
	print "<td>$row[1]</td>";
	print "<td>$row[2]</td>";
	print "<td>$row[3]</td>";
	print "<td>$row[4]</td>";
	print "</tr>";
}
print "</table" ;
}








?>