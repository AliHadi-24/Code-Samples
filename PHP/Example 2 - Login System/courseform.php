<?php
session_start();
include "functions.php"	;
include "connection.php";
include "messages.php";
?>
<!doctype html>
<html>
<head>
<title>Tables</title>
</head>
<body>
<form name="course" action="courseformprocesing.php" method="post">
Course Id:
<input name="courseId" type="text" value="<?php if (isset($_SESSION['courseId'])) print $_SESSION['courseId'];?>" />
<br>
Course Name:
<input name="coursename" type="text" value="<?php if (isset($_SESSION['coursename'])) print $_SESSION['coursename'];?>" />
<br>
Course Location:
<select name="suburb">
<option value="0">Select a location</option>
<?php
$sql = "select * from location";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result))
{
	if ($row[1] == $_SESSION['locationid'])
		{
			print "<option value='$row[0]' selected>$row[1]</option>";
		}
	else
		{
			print "<option value='$row[0]'>$row[1]</option>";
		}
}	
?>
</select>
<br>
<input value="Submit" type="submit" />
<input value="Add" type="submit" />
<input type="submit" value="Delete" name="delete">
<input type="submit" value="Update" name="Update">
</form>
</body>
</html>
