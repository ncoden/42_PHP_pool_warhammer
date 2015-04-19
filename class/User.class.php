<?php

require_once('class/DataBase.class.php')

class User
{
	private static				$_salt = '#Wrwf42324 a )d_#)()#(r ';

	private						$_id;
	private						$_login;
	private						$_password;
	private						$_gameWon;
	private						$_gameLost;

	public static function		doc()
	{
		return (file_get_contents('User.doc.txt'));
	}

	public static function		create(array $kwargs)
	{
		if (isset($kwargs['login'])
			&& isset($kwargs['password'])
			&& isset($kwargs['gameWon']))
		{
			DataBase::insert('users', array(
				'login' => $kwargs['login'],
				'password' => md5($_salt.$kwargs['password'])
			));
		}
	}

	public function				__construct(array $kwargs)
	{
		if (isset($kwargs['id'])
			&& isset($kwargs['login'])
			&& isset($kwargs['password'])
			&& isset($kwargs['gameWon'])
			&& isset($kwargs['gameLost']))
		{
			$this->_id = intval($kwargs['id']);
			$this->_login = $kwargs['login'];
			$this->_password = $kwargs['password'];
			$this->_gameWon = intval($kwargs['gameWom']);
			$this->_gameLost = intval($kwargs['gameLost']);
		}
	}
}

?>