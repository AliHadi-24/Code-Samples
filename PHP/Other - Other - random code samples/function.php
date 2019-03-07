<?php
function FirstFunction($val){
	if (empty($val) == true)
	{
		return 1;
	}else{
		return 2;
	}
}

function SecondFunction($str){
	if (empty($str) == true)
	{
		return false;
	}else{
		return true;
	}
}
//3
$input = "";
$valid = FirstFunction($input);

//4
$input = "123456";
$valid = SecondFunction($input);

//5
ThirdFunction($num1 + $num2){
	return $num1 + $num2;
}

//6
function FourthFunction($n1, $n2)
{
	if($n1 > $n2){
		return $n1;
	}else{
		return $n2;
	}
}

//7
$number1 = 10;
$number2 = 12;
$total = ThirdFunction($number1, $number2);

//8
$value1 = 10;
$value2 = 12;
$bigestNumber = ThirdFunction($value1, $value2);

//




?>