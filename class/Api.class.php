<?php

require_once('class/Game.class.php');
require_once('class/InstanceManager.class.php');

class Api
{
	public function			__construct()
	{

	}

	private function		checkPlayerRight($userId = NULL)
	{
		//$game = InstanceManager::

	}

	private function 		isPlayerLogged()
	{
		if (isset($_SESSION['id']))
			return (1);
		return(0);
	}

	public function 		gameCreate(array $datas)
	{
		if (isset($datas['name']))
			return(Game::create($datas['name']));
		return (FALSE);
	}

	public function			gameLoad(array $datas)
	{
		if (!isset($datas['id']))
			return (FALSE);
		$gameId = $datas['id'];

		return (array(
			'game'			=> InstanceManager::getGame($gameId),
			'elements'		=> InstanceManager::getAllElements($gameId),
			'players'		=> InstanceManager::getAllPlayers($gameId),
			'ship'			=> InstanceManager::getAllShip($gameId),
			'shipModels' 	=> InstanceManager::getAllShipModels($gameId),
			'weapons'		=> InstanceManager::getAllWeapons($gameId),
			'weaponModels'	=> InstanceManager::getAllWeaponModels($gameId)
		));
	}

	public function			request($request, array $datas)
	{
		$methods = [
			'game/create' => 'gameCreate',
			'game/load' => 'gameLoad',
			'game/refresh' => 'gameRefresh',
			'ship/move' => 'shipMove',
			'ship/fire' => 'shipFire',
		];

		if (isset($methods[$request]))
			return(call_user_func('$this->'.$methods[$request], $datas));
		return (FALSE);
	}

}

?>