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

	public static function		select($table, $id, $values)
	{
		if (is_array($args1)
		&& $db = DataBase::connect())
		{
			// build the req
			$req = 'SELECT ';

			if (is_array($values))
				$req .= implode($values, ', ');
			else
				$req .= '*';
			$req .= ' FROM '.$table.' WHERE id = ?';

			// request !
			return (DataBase::req($sql, array($id)));
		}
		return (FALSE);
	}

	public static function		update($table, $id, $values)
	{
		if (is_array($value)
		&& $db = DataBase::connect())
		{
			// build the req
			$sql = 'UPDATE '.$table.' SET';
			foreach ($values as $field => $value)
				$sql .= $field.' = ?,';
			$sql = substr($req, 0, -1);
			$sql .= 'WHERE id = ?';

			// add the id in the argument list
			array_push($values, $id);

			// request !
			return (DataBase::req($sql, array_values($values)));
		}
		return (FALSE);
	}

	public static function		insert($table, $datas)
	{
		if (!empty($datas))
		{
			$sql = 'INSERT INTO '.$table.' ('.implode(array_keys($datas), ',').') VALUES (?';

			$count = count($datas) - 1;
			for ($i = 0; $i < $count; $i++)
				$sql .= ',?';
			$sql .= ')';

			return (DataBase::req($sql, array_values($datas)));
		}
		return (FALSE);
	}

	public static function		req($sql, $datas = [])
	{
		if ($db = DataBase::connect())
		{
			$req = $db->prepare($req);
			if ($db->execute(array_values($datas)))
			{
				$return = array();
				while ($row = $req->fetch())
					array_push($return, $row);
				return ($return);
			}
		}
		return (FALSE);
	}
}

?>