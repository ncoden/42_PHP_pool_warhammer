<?php

class Api
{
	public function			__construct()
	{

	}

	private function		checkPlayerRight($userId = NULL)
	{
		$game = Database::req('SELECT * FROM `games` WHERE `id`=? ');

	}

	public function			request($request, $datas)
	{
		$methods = [
			'game/start',
		]
	}
}

?>