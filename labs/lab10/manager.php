<?php

error_reporting(E_ALL);
        ini_set("display_errors","On");

include 'info/Info.php';
include 'baza/Baza.php';
include 'test/Test.php';

use info\Info ;
use baza\Baza ;
use test\Test ;
 
try {
 
  if (empty ($_GET['sub']))    { $contr = 'Info' ;   }
  else                         { $contr = $_GET['sub'] ; }
 
  if (empty ($_GET['action'])) { $action     = 'index' ;  }
  else                         { $action     = $_GET['action'] ; } 
   
  // print $contr. ' ' . $action .' - ';
   
  switch ($contr) {           
     case 'Info' :
       $contr = "info\\".$contr ;                      
       break ;
     case 'Baza' :
       $contr = "baza\\" . $contr ;
       break ;
  }
  $controller = new $contr ;
  echo $controller->$action() ;
}
catch (Exception $e) {
  // echo 'Blad -.- : [' . $e->getCode() . '] ' . $e->getMessage() . '</br>' ;
  // echo __CLASS__.':'.__LINE__.':'.__FILE__ ;
  // $contr = new info() ;
  // echo $contr->error ( $e->getMessage() ) ;
  echo 'Error: [' . $e->getCode() . '] ' . $e->getMessage() ;
 
}
 
?>
