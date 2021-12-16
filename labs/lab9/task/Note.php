<?php

error_reporting(E_ALL);
ini_set("display_errors","On");

class Note implements NoteInterface
{
	private $data = array();
	private $dbh;
	private $dbfile = "notes.db";

	function _read()
	{
		$reg = new Register;
		$key = array();

		if($reg->_is_logged())
		{
			$key[0] = $_SESSION['user'];
			$key[1] = date("Y-m-d_H-i-s", time());
			$this->data['key'] = $key;
			$this->data['note'] = $_POST['note'];
		}
	}

	function _save_messages()
	{
		$reg = new Register;
		if($reg->_is_logged())
		{
			$this->dbh = dba_open($this->dbfile, "c");
			$serialized_data = serialize($this->data);			
			dba_insert($this->data['key'], $serialized_data, $this->dbh);
			dba_close($this->dbh);
			$text = 'Note saved.';
		}
		else
		{
			$text = 'User not logged in.';
		}
		return $text;
	}

	function _read_messages()
	{
		$reg = new Register;
		if($reg->_is_logged())
		{
			$email = $_SESSION['user'];
			$notes = array();

			$this->dbh = dba_open($this->dbfile, "r");
			$key = dba_firstkey($this->dbh);
			while($key)
			{
				$serialized_data = dba_fetch($key, $this->dbh);
				$this->data = unserialize($serialized_data);
				if(!strcmp($email, $this->data['key'][0]))
				{
					$notes[$key]['date'] = $this->data['key'][1];
					$notes[$key]['note'] = $this->data['note'];
				}
				$key = dba_nextkey($this->dbh);
			}
			dba_close($this->dbh);
			return $notes;
		}
		else
		{
			return false;
		}
	}
}

?>
