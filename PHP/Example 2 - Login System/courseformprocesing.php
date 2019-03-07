<?php
session_start();
include "functions.php"	;
include "connection.php";
include "messages.php";
$courseId = $_POST['courseId'];
$coursename = $_POST['coursename'];
$locationid =  $_POST['suburb'];
if (isset($_POST['Add']))//clicked on add button
{
	$valid = ValidateInput($courseId);
	if (!$valid)
	{
		header("location:courseform.php?message=$messages[8]");
		exit();
	}
	$valid = ValidateInput($coursename);
	if (!$valid)
	{
		header("location:courseform.php?message=$messages[9]");
		exit();
	}
	$valid = ValidateInput($locationid);
	if (!$valid)
	{
		header("location:courseform.php?message=$messages[10]");
		exit();
	}
	$sql = "insert into course values(null, '$coursename',$locationid)";
	$result = mysqli_query($conn, $sql);
	header("location:courseform.php?message=$messages[13]");
	exit();
}
else
if (isset($_POST['Delete']))//clicked on delete button
{
	$valid = ValidateInput($courseId);
	if (!$valid)
	{
		header("location:courseform.php?message=$messages[8]");
		exit();
	}
	
	$sql = "delete from course where coureid = $courseId"; 
	$result = mysqli_query($conn, $sql);
	header("location:courseform.php?message=$messages[6]");
	exit();
}
else if (isset($_POST['Update']))//clicked on update button
{
	$valid = ValidateInput($courseId);
	if (!$valid)
	{
		header("location:courseform.php?message=$messages[8]");
		exit();
	}
	$valid = ValidateInput($coursename);
	if (!$valid)
	{
		header("location:courseform.php?message=$messages[9]");
		exit();
	}
	$valid = ValidateInput($locationid);
	if (!$valid)
	{
		header("location:courseform.php?message=$messages[10]");
		exit();
	}
	$sql = "update course set coursename = '$coursename' where courseId = $courseId)";
	$result = mysqli_query($conn, $sql);
	header("location:courseform.php?message=$messages[15]");
	exit();
}

else if (isset($_GET['courseId']))
{
	$courseId = $_GET['courseId'];
	$sql = "select * from course where courseId = $courseId";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$_SESSION["courseId"] = $row[0];
	$_SESSION["coursename"] = $row[1];
	$_SESSION["locationid"] = $row[2];
	header("location:courseform.php");
	
	exit();
}
?>