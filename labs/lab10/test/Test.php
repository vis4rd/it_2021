<?php

namespace test ;

//error_reporting(E_ALL);
//ini_set("display_errors","On");
 
 use appl\ { View, Controller } ;
// use appl\Controller ;
 
class Test extends Controller {
 
   protected $layout ;
 
   function __construct() {
      $this->layout = new View('hello') ;    
      $this->layout->title = 'Test view' ;
      $this->layout->content = 'Hello, World !' ;
   }
 
  function index() {
      return $this->layout ;
  }
}
 
?>
