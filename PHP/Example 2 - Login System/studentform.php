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