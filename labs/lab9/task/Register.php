<?php

	class Register
	{
		private $data = array();
		private $dbh;
		private $dbfile = "users.db";

		function __construct()
		{
			if(!$this->_is_logged())
			{
				session_start();
			}
		}

		function _read()
		{
			$this->data['email'] = $_POST['email'];
			$this->data['pass']  = $_POST['pass'];
	   	}

		function _save()
		{
			$this->dbh = dba_open($this->dbfile, "r");
			if(!dba_exists($this->data['email'], $this->dbh))
			{ // register
				dba_close($this->dbh);
				$text = $this->_register();
				$this->_login();
			}
			else
			{ // login
				$text = $this->_login();
			}
			return $text;
		}

		function _login()
		{
			$email = $_POST['email'];
			$pass  = $_POST['pass'];
			$access = false;
			$this->dbh = dba_open($this->dbfile, "r");
			if(dba_exists($email, $this->dbh))
			{
				$serialized_data = dba_fetch($email, $this->dbh);
				$this->data = unserialize($serialized_data);
				if($this->data['pass'] == $pass)
				{
					$_SESSION['auth'] = 'OK';
					$_SESSION['user'] = $email;
					$access = true;
				}
			}
			dba_close($this->dbh);
			$text = ($access ? 'Log in successful.' : 'Invalid email or password.');
			return $text;
		}

		function _register()
		{
			$this->dbh = dba_open($this->dbfile, "c");
			$serialized_data = serialize($this->data);
			dba_insert($this->data['email'], $serialized_data, $this->dbh);
			$text = 'Registration successful.';
			dba_close($this->dbh);
			return $text;
		}

		function _is_logged()
		{
			if(isset($_SESSION['auth']))
			{ 
				$ret = $_SESSION['auth'] == 'OK' ? true : false;
			}
			else
			{
				$ret = false;
			}
			return $ret;
		}

		function _logout()
		{
			unset($_SESSION); 
			session_destroy();   
			$text =  'User logged out.';
			return $text ;
		}

		function _users()
		{
			$users = array();

			$this->dbh = dba_open($this->dbfile, "r");
			$key = dba_firstkey($this->dbh);
			while($key)
			{
				$users[] = $key;
				$key = dba_nextkey($this->dbh);
			}
			dba_close($this->dbh);
			return $users;
		}
	}

?>
