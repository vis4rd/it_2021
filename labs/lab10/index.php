<?php

include 'user/User.php';

use user\User;

//error_reporting(E_ALL);
//ini_set("display_errors","On");

//function __autoload($class_name)
//{
//	include $class_name . '.php';
//}

echo "<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
	<link rel='stylesheet' href='css/lab10.css'>
	<title>Kluczka - Task 10</title>
</head>
<body>
	<div class='parag' id='centercontent'>
		<h1>Task 10</h1>
	</div>";
$reg = new User;
if($reg->_is_logged())
{
	$t1 = file_get_contents('template/menu.tpl');
	echo $t1;
}
else
{
	echo file_get_contents('template/menu.tpl');
}

echo "
	</nav>";
if($reg->_is_logged())
{
	echo "<div class='parag'> (Currently logged in as " . $_SESSION['user'] . ").";
}
echo "</body></html>";

?>
