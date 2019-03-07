<?php
$age = 18;
$name = "Ali Hadi";
if ($age > 18)
{
    $message = "Welcome to php :)";
    $years = $age - 18;
    $yearsMsg = "Years as developer";
}
else
{
    $message = "You gotta wait";
    $years = 18 - $age;
    $yearsMsg = "Years to become a developer";
}

echo $name."," .$message . " you have " . $years . $yearsMsg;
?>