<?php

class Player
{
	private						$_id;
	private						$_game;
	private						$_user;

	public static function		doc()
	{
		return (file_get_contents('Player.doc.txt'));
	}

	public function				__construct(array $kwargs)
	{
		if (isset($kwargs['id'])
			&& isset($kwargs['game'])
			&& isset($kwargs['user']))
		{
			$this->_id = $kwargs['id'];
			$this->_game = $kwargs['game'];
			$this->_user = $kwargs['user'];
		}
	}
}

?>