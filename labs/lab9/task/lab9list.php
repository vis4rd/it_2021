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
        echo "<div class='parag'><h2>Notes of " . $_SESSION['user'] . "</h2></div>";
    	
        $list = new Note;
	    $notes = $list->_read_messages();
        if($notes)
        {
            echo "<div class='parag'><a href='lab9menu.php'>Return to main menu</a></div>";

            foreach($notes as $key => $note)
            {
                echo "<div class='parag'>date: " . $note['date'] . "<br> note: " . $note['note'] . "</div>";
            }
        }
    }
    else
    {
        // easter egg
        echo "<div class='parag'><h2>Wait, you shouldn't be here!</h2></div>";
    }
    
    echo "<div class='parag'><a href='lab9menu.php'>Return to main menu</a></div></body></html>";

?>