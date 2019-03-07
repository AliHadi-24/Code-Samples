<?php
   function addDetails()
   {
     $fname = $_POST['firstname'];
	 $lname = $_POST['lastname'];
	 $email = $_POST['email'];
	 $phone = $_POST['phone'];
   	 $dbhost = 'localhost';
   	 $dbuser = 'root';
   	 $dbpass = '';
   	 $dbname = "henrys_books";
   	 $conn = new MySQLi($dbhost,$dbuser,$dbpass,$dbname);
   	 if($conn->connect_error ) { 
     	die('Could not connect: ' );
   	  }
	  $msg = validate($fname,$lname,$email,$phone);
	  $len = strlen($msg);	  
	  if($len==0)
   	  {
		  $sql = "insert into author values (NULL,'$fname','$lname','$email', '$phone');";
		  echo $sql;
   		  $result = $conn->query($sql);
   	  	  if($result == true)
	  		echo "Record added successfully";
	  	  else
	  		echo "Error in adding record" . $conn->error;  
	  }
	  else
	  {
		  $startMsg = "<script language='javascript' type='text/javascript'>window.alert(\"";
		  $endMsg = "\"); </script>";
		  
		  echo "$startMsg $msg $endMsg";
		displayForm();
	  }
   	  $conn->close(); 
    }
   
   function displayForm()
   {
	   if(isset($_POST['btnAddRecord']))
	   {
		   $fname = $_POST['firstname'];
	 	   $lname = $_POST['lastname'];
	 	   $email = $_POST['email'];
	 	   $phone = $_POST['phone'];
		  
	   }
	   else
	   {
			$fname = $lname = $email = $phone = "";
		}
	   $actionStr = htmlspecialchars($_SERVER['PHP_SELF']);
	   $dispValue = <<<END

<form name="addDetails" action="$actionStr" method="post" name="addDetails" id="addDetails"><div class="centreMe">
</p><p>
   
<p><label for="firstname">
    First name</label>
	<input type="text" name="firstname" size="30" maxlength="100" value="$fname" /><span class="compulsory">*</span>

</p><p>
<label for="lastname">
    Last name:</label>
    <input type="text" name="lastname" size="30" maxlength="100" value="$lname"/><span class="compulsory">*</span>

</p><p>
<label for="email">
    Email:</label>
    <input type="email" name="email" size="30" maxlength="100" value="$email"/><span class="compulsory">*</span>

</p><p>
<label for="phone">
   Phone:</label>
   <input type="text" name="phone" size="30" maxlength="100" value="$phone"/><span class="compulsory">*</span>

</p><p>
<input type ="submit" value = "Add this record" name="btnAddRecord" id="btnAddRecord" class="button" />
</p></div>
</form>

END;

	  echo $dispValue;
   }
   // $msg = validate($fname,$lname,$email,$phone,$picture);
   function validate($fnam, $lnam, $em,$ph )
   {
	$valid = false;
	$errMsg ="";
	//use regular expressions to test content of fname
	//ref: https://code.tutsplus.com/tutorials/8-regular-expressions-you-should-know--net-6149
	//ref: https://www.w3schools.com/php/php_form_url_email.asp
	if(strlen($fnam)<3)
		$errMsg .= "Name must be at least 3 characters long".'\n';	
	else if(!preg_match("/^[a-zA-Z]*$/",$fnam))
		$errMsg .= "Name can contain alphabets only" .'\n';
		
	//last name
	if(strlen($lnam)<3)
		$errMsg .= "Last name must be at least 3 characters in length" .'\n';
	else if(!preg_match("/^[a-zA-Z]*$/",$lnam))
		$errMsg .= "Last name can contain only alphabets" . '\n';
		
	//validate email
	if(empty($em))
		$errMsg .="Email is required";
	else if(!(filter_var($em, FILTER_VALIDATE_EMAIL)))
		$errMsg .= "Email not valid" .'\n';
		
	//phone
	if(empty($ph))
		$errMsg .= "Phone number is required";
	else if(!preg_match("/^[0-9]{8}$/",$ph))
		$errMsg .= "Phone number 8 digits only";
			
	return $errMsg; 
	 
   }
?>