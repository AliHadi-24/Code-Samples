<?php
   function displayDetails()
   {
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = "henrys_books";
   $conn = mysql_connect($dbhost,$dbuser,$dbpass);
   if(!$conn ) { 
      die('Could not connect: ' . mysql_error());
   }
   $succuss = mysql_select_db($dbname,$conn) or die("Not able to connect to $dbname");
   $result = mysql_query("select * from author;");
   $num = mysql_num_rows($result);
   if($num>0)
   {	   
   print("<table border='1' align='center'>");
   print("<th>ID</th><th>Name</th><th>EMail</th>");
   while($record = mysql_fetch_array($result))
   {
	   printf("<tr><td>%d</td><td>%s %s</td><td>%s</td><td><img src='images/%s' width='200px' height='200px'/></tr>",$record["AUTHOR_NUM"],$record["AUTHOR_FIRST"], $record["AUTHOR_LAST"],$record["Email"],$record["Phone"]);
   } 
   print("</table>");
   }
   mysql_close($conn); 
   }
?>