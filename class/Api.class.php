<?php

class Api
{
	public function __construct()
	{

	}

	private function checkPlayerRight($userId = NULL)
	{
		$game = Database::req('SELECT * FROM `games` WHERE `id`=? ');

	}

	public function			request($userId = NULL)
	{
		if (isset($userId) && $userId == $_SESSION['user'])
		{

		}
	}
}

?>