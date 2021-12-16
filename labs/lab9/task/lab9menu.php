<?php

	error_reporting(E_ALL);
	ini_set("display_errors","On");

	function __autoload($class_name)
	{
		include $class_name . '.php';
	}

	echo "<!DOCTYPE html>
	<html lang='en'>
	<head>
		<meta charset='utf-8'>
		<link rel='stylesheet' href='lab9.css'>
		<title>Kluczka - Task 9</title>
	</head>
	<body>
		<div class='parag' id='centercontent'>
			<h1>Task 9 - Notebook</h1>
		</div>
		<nav>
			<div class='navbar-entry'>
				<a href='lab9users.php'>users</a>
			</div>";
	$reg = new Register;
	if($reg->_is_logged())
	{
		echo "
			<div class='navbar-entry'>
				<a href='lab9newnote.html'>new note</a>
			</div>
			<div class='navbar-entry'>
				<a href='lab9list.php'>list</a>
			</div>
			<div class='navbar-entry'>
				<a href='lab9logout.php'>logout</a>
			</div>";
	}
	else
	{
		echo "
			<div class='navbar-entry'>
				<a href='lab9signin.html'>sign in</a>
			</div>";
	}
	echo "
		</nav>";
	if($reg->_is_logged())
	{
		echo "<div class='parag'> (Currently logged in as " . $_SESSION['user'] . ").";
	}
	echo "</body></html>";

?>