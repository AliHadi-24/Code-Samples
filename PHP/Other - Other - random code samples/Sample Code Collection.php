<?php
//********** START *********** //
//////   >>>>>  <<<<<   /////
//========== END =========== //

//********** START *********** //
//////   >>>>> Conection to database <<<<<   /////

$conn = mysqli_connect("localhost:3306", "root", "", "cms");
if (!$conn)
{
	print "Connection not successful";
	exit();
}

//////   >>>>> Conection to database <<<<<   /////
//========== END =========== //

//&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&//

//********** START *********** //
//////   >>>>> Functions <<<<<   /////

function validateInput($val)//This Functions returns a boolean value
{
	if (empty($val))
	{
		return false;
	}
	else
	{
		return true;
	}
}

function validateInputLength($val)//This Functions returns a boolean value
{
	if (strlen($val) !=1) //if is not equal to 1 rturn 1
	{
		return false;
		
	}
	else
	{
		return true;
	}
}



<?php
    //////1
    
	$email = $_POST['email'];
	$valid = validateEmail($email);
	if (!$valid){
		header("location:hwork.php?message=$message");
		exit();
	}
	
	function validateEmail($email)
	{
		global $message;            // have to type global $message and iclude msg in every file
		$pos = stripos($email, "@");
		if (empty($email) == true)
		{
			$message = "Student email is required";
			return false;
		}
		else if (stripos($email,"@") === false)
		{
			$message = "The Email Must have @ Character";
			return false;
		}
		else if (stripos($email,"@") === 0)
		{
			$message = "You cant start with @";
			return false;
		}
		else if(stripos($email,"@") === strlen($email) - 1)
		{
			$message = "you cant end with @";
			return false;
		}
		else if(substr_count($email, "@") > 1)
		{
			$message = "The Email cannot contain more than 1 @";
			return false;
		}
		else if(stripos($email, "@.") !== false)
		{
			$message = "You can have @. together";
			return false;
		}
		else if(stripos($email, ".@"))
		{
			$message = "You can have .@ together";
			return false;
		}
		else if(!stripos($email, "."))
		{
			$message = "The Email must Contain 1 .";
			return false;
		}
		else if(substr_count($email, ".", 0, $pos) > 1)
		{
			$message = "You cant have more then 1 . before @";
			return false;
			
		}
		else if(substr_count($email, ".", 0, $pos) > 1)
		{
			$message = "You cant have more then 1 . before @";
			return false;
		}
		else
		{
			$message = "Email Verified";
			return true;
		}
		
		//validateEmail($email);
		//else if(preg_match('/[\'\/~`\!#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\\?\\\]/'))
		//{
		//	$message = "you cant contain any special Character other then @ and .";
		//	return false;
		//}
		
	}
	
	

//////   >>>>> Functions <<<<<   /////
//========== END =========== //

//&&&&&&&&&&&&&&&&&&&&&&//


//********** START *********** //
//////   >>>>> studentform studentformprocessing php section <<<<<   /////

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
$_SESSION["studentId"] = $studentId;                //Saving Student id as a sassion
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
		header("location:studentform.php?message=$messages[1]");
		exit();
	}

	if (empty($studentEmail) == true)
	{
		header("location:studentform.php?message=$messages[2]");
		exit();
	}
	if (empty($studentDob) == true)
	{
		header("location:studentform.php?message=$messages[3]");
		exit();
	}

	if (empty($courseId) == true)
	{
		header("location:studentform.php?message=$messages[4]");
		exit();
}


$sql = "insert into student values ($studentId, '$studentName', '$studentEmail', '$studentDob', $courseId)";
$result = mysqli_query($conn, $sql);
header("location:studentform.php?message=$messages[5]");
}

if(isset($_POST['delete']))
{
	
	$valid = validateInput($studentId);// calling the function Function
	if ($valid == false){
		header("location:studentform.php?message=$messages[6]");
		exit();
	}
	
	$valid = validateInputLength($studentId);// calling the Function
	if ($valid == false){
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
		header("location:studentform.php?message=$messages[10]");
		exit();
	}
	
	$valid = validateInput($studentEmail);// calling the Function
	if ($valid == false){
		header("location:studentform.php?message=$messages[11]");
		exit();
	}
	
	$valid = validateInput($studentDob);// calling the Function
	if ($valid == false){
		header("location:studentform.php?message=$messages[12]");
		exit();
	}
	
	$valid = validateInput($courseId);// calling the Function
	if ($valid == false){
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
//////   >>>>> studentform studentformprocessing php section <<<<<   /////
//========== END =========== //

//&&&&&&&&&&&&&&&&&&&&&&&//
?>



/////////////// studentform studentformprocessing html Section

<?php 
session_start();
include "functions.php"	;
include "connection.php";
include "messages.php";
 ?>
<html>
<body>
<form  action="studentformprocessing.php" method="post">
    <div>
    
	<div>
   
    Student ID :<input type="text" name="studentId" value="<?php if (isset($_SESSION['studentId'])) print $_SESSION['studentId'];?>" /><br>
         </div>
    <div>
   
    Student Name :<input type="text" name="studentName" value="<?php if (isset($_SESSION['studentName'])) print $_SESSION['studentName'];?>" /><br>
	
         </div>
	<div>
   
    Student Email :<input type="text" name="studentEmail" value="<?php if (isset($_SESSION['studentEmail'])) print $_SESSION['studentEmail'];?>" /><br>
         </div>
		 
	<div>
   
    Student DOB :<input type="date" name="studentDob" value="<?php if (isset($_SESSION['studentDob'])) print $_SESSION['studentDob'];?>" /><br>
         </div>
		 
	<div>
   
    Course ID :<input type="text" name="courseId" value="<?php if (isset($_SESSION['courseId'])) print $_SESSION['courseId'];?>" /><br>
         </div>
		 
	
        <input type="submit">
		<input type="submit" value="Add" name="Add">
		<input type="submit" value="Delete" name="delete">
		<input type="submit" value="Search" name="search">
		<input type="submit" value="View All" name="viewAll">
    </form>
<?php
include "messages.php";
	if (isset($_GET['message']))
	{
		$message = $_GET['message'];
		print "<p style='color:red;'>$message</p>";
	}
?>
     </body>
	 </html>
	 
/////////////// END OF studentform studentformprocessing html Section
/////////////// END OF studentform studentformprocessing html Section
