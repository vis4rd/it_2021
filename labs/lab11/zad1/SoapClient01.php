<?php    
 
   $debug  = 0;
   $client = new SoapClient(null, array(
      'location' => "http://pascal.fis.agh.edu.pl/~9kluczka/labs/lab11/zad1/SoapServer01.php",
      'uri'      => "http://pascal.fis.agh.edu.pl/Demo",
      'soap_version' => SOAP_1_2,
      'trace'    => $debug ));
 
   $return = $client->__soapCall("test",array(""));
   echo "<pre>" ;
   echo("\n<b>;Returning value of __soapCall() call: </b>".$return);
   echo "</pre>";
   if ( $debug == 1 ) {
   echo "<pre>" ;
   echo("\nDumping request headers:\n"
      .$client->__getLastRequestHeaders());
 
   echo("\nDumping request:\n".$client->__getLastRequest());
 
   echo("\nDumping response headers:\n"
      .$client->__getLastResponseHeaders());
 
   echo("\nDumping response:\n".$client->__getLastResponse());
   echo "</pre>;" ; 
   }
 
?>
