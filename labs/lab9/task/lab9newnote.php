<?php

	error_reporting(E_ALL);
	ini_set("display_errors","On");

	function __autoload($class_name)
	{
		include $class_name . '.php';
	}

	echo "
    <html>
    <head>
        <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
        <link rel='stylesheet' href='lab9.css'>
        <title>Task 9 - List of notes</title>
    </head>
    <body>";

	$reg = new Register;
	if($reg->_is_logged())
	{
		$note = new Note;
		$note->_read();
		$text = $note->_save_messages();

		echo "<div class='parag'>" . $text . "
			<br><br>
			<a href='lab9menu.php'>Return to main menu.</a>
			</div>";
	}

	echo "</body></html>";

?>