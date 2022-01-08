<?php

//error_reporting(E_ALL);
//ini_set("display_errors","On");

include '../appl/View.php' ;
include '../appl/Controller.php' ;
include 'Test.php' ;

use test\Test ;

$obj = new Test() ;
echo $obj->index() ;

?>
