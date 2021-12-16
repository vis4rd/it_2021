<?php

    error_reporting(E_ALL);
    ini_set("display_errors","On");

    function __autoload($class_name)
    {
        include $class_name . '.php';
    }
     
    $reg = new Register;
    $reg->_read();
    echo "
    <html>
    <head>
        <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
        <link rel='stylesheet' href='lab9.css'>
        <title>Task 9 - List of notes</title>
    </head>
    <body>";
    echo $reg->_save();
    echo "<div class='parag'><a href='lab9menu.php'>Return to main menu</a></div></body></html>";
             
?>