<?php

class DataBase
{
	private	static				$_db;
	private	static				$_server;
	private	static				$_name;
	private	static				$_username;
	private	static				$_password;

	public static function		doc()
	{
		return (file_get_contents('DataBase.doc.txt'));
	}

	public function				__construct($kwargs = NULL)
	{
		if ($_db != NULL
			|| (is_array($kwargs) && self::init($kwargs)))
		{
			self::$_db = new PDO(
				'mysql:host='.self::$_server.
				';dbname='.self::$_name,
				self::$_username,
				self::$_password
			);
		}
		if (self::$_db)
			return (self::$_db)
		else
			return (FALSE);
	}

	public static function		init(array $kwargs)
	{
		if (isset($kwargs['server'])
			&& isset($kwargs['name'])
			&& isset($kwargs['username'])
			&& isset($kwargs['password']))
		{
			$this->_server = $kwargs['server'];
			$this->_server = $kwargs['name'];
			$this->_server = $kwargs['username'];
			$this->_server = $kwargs['password'];
			return (TRUE);
		}
		else
			return (FALSE);
	}

}

?>