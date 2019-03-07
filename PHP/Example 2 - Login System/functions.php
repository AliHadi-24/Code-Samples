<?php
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
	if (strlen($val) !=1)
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
		global $message;
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
	
	
	
?>

?>