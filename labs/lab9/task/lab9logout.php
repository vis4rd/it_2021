<?php

	function __autoload($class_name)
	{
		include $class_name . '.php';
	}

	$reg = new Register;
	$reg->_logout();

	function redirect($url, $statusCode = 303)
	{
		header('Location: ' . $url, true, $statusCode); die();
	}

	redirect('lab9menu.php');

?>
