 <html>
<body>
<form  action="loginformprocessing.php" method="post">
    <div>
    
    
User ID: <input type="text" name="userId"><br>
        </div>
    <div>
   
    Password :<input type="password" name="password"><br>
         </div>
        <input type="submit">
    </form>     
     </body>
	 
	 error_reporting(0);
print "Hello ". $_SESSION['userId'];



print "The user id is= ". $userId  . "<br>";
print "The password is=". $password;
}
$conn= mysqli_connect("localhost:3306","root","","cms");
if($conn)
{
//print "connection successful";
}

///////////////
<?php
session_start();
$studenrID = $_POST['userId'];
$studentName = $_POST['studentName'];
$studentEmail = $_POST['studentEmail'];
$studentDob = $_POST['studentDob'];
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
///////////////