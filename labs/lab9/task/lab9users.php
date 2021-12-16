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
    <body>
        <div class='parag'>
            <h2>List of all registered users</h2>
        </div>";

    $reg = new Register;
    	
    $users = $reg->_users();
    if($users)
    {
        echo "<div class='parag'><a href='lab9menu.php'>Return to main menu</a></div>";
        echo "<div class='parag'>";
        foreach($users as $us)
        {
            echo $us . "<br>";
        }
        echo "</div>";
    }
    
    echo "<div class='parag'><a href='lab9menu.php'>Return to main menu</a></div></body></html>";

?>