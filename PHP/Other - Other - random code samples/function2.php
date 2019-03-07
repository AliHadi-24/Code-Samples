<?php
//1
function getLength($val)
{
	echo strlen($val);
}

//2
function divide2($num1, $num2)
{
	if($num2 != 0)
	{
		$cal = $num1 / $num2;
		echo $cal;
		return true;
	}
	else
	{
		return false;
	}
}

//3
$string = "JJDHFGJG DSHF HI";
getLength($string);

//4
divide2(5, 5);

//5
function getArratSum($ar)
{
	$arrayLen = count($ar);
	$sumArray = 0;
	for ($i = 0; $i < $arrayLen; $i++)
	{
		$sumArray += $ar[$i];
	}
	return $sumArray;
}

//6
function createArray($val1, $val2, $val3)
{
	$newArray = array($val1,$val2,$val3);
	foreach($newArray as $pValue)
	{
		echo "   ";
		echo $pValue;
	}
}

//7
$array1 = array(1, 3, 2, 4);
getArratSum($array1);

//8
createArray("sf", "dfdf", "eff");

//9
function first10int()
{
	$sum = 0;
	for ($i = 0; $i < 11; $i++)
	{
		$sum += $i;
	}
	echo $sum;
}
//10
first10int();

?>