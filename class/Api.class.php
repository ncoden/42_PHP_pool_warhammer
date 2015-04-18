<?php

class Api
{
	public function			__construct()
	{

	}

	private function		checkPlayerRight($userId = NULL)
	{
		$game = InstanceManager::

	}

	private function 		isPlayerLogged()
	{
		if (isset($_SESSION['id']))
			return (1);
		return(0);
	}

	public function 		GameCreate(array $datas)
	{
		if (isset($datas['name']))
			return(Game::gameCreate($datas['name']));
		return (FALSE);
	}

	public function			request($request, $datas)
	{
		$methods = [
			'game/create' => 'GameCreate',
			'game/load' => 'GameLoad',
			'game/refresh' => 'GameRefresh',
			'ship/move' => 'ShipMove',
			'ship/fire' => 'ShipFire',
		];

		if (isset($methods[$request]))
			return(call_user_func('$this->'.$methods[$request], $datas))
		return (FALSE);
	}

}

?>