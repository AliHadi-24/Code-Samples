<?php
session_start();
include "functions.php"	;
include "connection.php";
$userId = $_POST['userId'];
$password = $_POST['password'];
$conn = mysqli_connect("localhost:3307", "root", "", "cms");
if (!$conn)
{
	print "Connection not successful";
	exit;
}
if (empty($userId) == true)
{
	print "User id is required";
	exit();
}

if (empty($password) == true)
{
	print "Password is required";
	exit();
}

$sql = "select userId from users where userId = '$userId'";
$result = mysqli_query($conn, $sql);
$numrows = mysqli_num_rows($result);
if ($numrows == 0)
{
	print "Invalid User id";
	exit();
}
$sql = "select password from users where password = '$password'";
$result = mysqli_query($conn, $sql);
$numrows = mysqli_num_rows($result);
if ($numrows == 0)
{
	print "Invalid Password";
	exit();
}
$row = mysqli_fetch_row($result);
$_SESSION['userId'] = $row[0];
header("location:studentform.php");
?>