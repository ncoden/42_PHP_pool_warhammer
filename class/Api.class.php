<?php

require_once('class/Game.class.php');
require_once('class/InstanceManager.class.php');

class Api
{
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

	public function 		gameCreate(array $datas)
	{
		if (isset($datas['name']))
			return(Game::create($datas['name']));
		return (FALSE);
	}

	public function 		join($gameId)
	{
		if (isset($_SESSION['userId']))
		{
			Database::insert('players', array(
				'userId' => $_SESSION['userId'],
				'gameId' => $gameId
				));
			$player = Database::getLastEntry('players');
			$playerId = $player['id'];
			Ship::CreateShips($playerId);
		}
		else
			return (FALSE);
	}

	public function			gameLoad(array $datas)
	{
		if (!isset($datas['id']))
			return (FALSE);
		$gameId = intval($datas['id']);

		$return = array();

		$game				= InstanceManager::getGame($gameId);
		$players			= InstanceManager::getAllPlayers($gameId);
		$elements			= InstanceManager::getAllElements($gameId);
		$ships				= InstanceManager::getAllShips($gameId);
		$shipModels			= InstanceManager::getAllShipModels($gameId);
		$weapons			= InstanceManager::getAllWeapons($gameId);
		$weaponModels		= InstanceManager::getAllWeaponModels($gameId);

		$return = array();

		$return['game'] = array(
			'state' => $game->getState(),
			'bigTurn' => $game->getBigTurn(),
			'smallTurn' => $game->getSmallTurn(),
			'winnerId' => $game->getWinnerId(),
		);

		$return['players'] = array();
		foreach ($players as $player)
		{
			array_push($return['players'], array(
				'id' => $player->getId(),
				'team' => $player->getTeam(),
			));
		}

		$return['elements'] = array();
		foreach ($elements as $element)
		{
			array_push($return['elements'], array(
				'type' => $element->getType(),
				'posX' => $element->getPosX(),
				'posY' => $element->getPosY(),
				'width' => $element->getWidth(),
				'height' => $element->getHeight(),
			));
		}

		$return['ships'] = array();
		foreach ($ships as $ship)
		{
			array_push($return['ships'], array(
				'id' => $ship->getId(),
				'player' => $ship->getPlayer(),
				'model' => $ship->getModel(),
				'posX' => $ship->getPosX(),
				'posY' => $ship->getPosY(),
				'orientation' => $weapon->getOrientation(),
				'moving' => $weapon->getMoving(),
				'hull' => $ship->getHull(),
				'shield' => $ship->getShield(),
				'active' => ($ship->getRound() == $game->getBigRound()),
				'state' => $ship->getState(),
				'weapons' => $ship->getWeapons(),
			));
		}

		$return['shipModels'] = array();
		foreach ($shipModels as $shipModel)
		{
			array_push($return['shipModels'], array(
				'id' => $shipModel->getId(),
				'name' => $shipModel->getName(),
				'width' => $shipModel->getWidth(),
				'height' => $shipModel->getHeight(),
				'sprite' => $shipModel->getSprite(),
				'defaultPP' => $shipModel->getDefaultPp(),
				'defaultHull' => $shipModel->getDefaultHull(),
				'defaultShield' => $shipModel->getDefaultShield(),
				'inerty' => $shipModel->getInerty(),
				'speed' => $shipModel->getSpeed(),
			));
		}

		$return['weapons'] = array();
		foreach ($weapons as $weapon)
		{
			array_push($return['weapons'], array(
				'id' => $weapon->getId(),
				'model' => $weapon->getModel(),
				'charge' => $weapon->getCharge(),
				'orientation' => $weapon->getOrientation(),
				'posX' => $weapon->getposX(),
				'posY' => $weapon->getposY()
			));
		}

		$return['weaponModels'] = array();
		foreach ($weaponModels as $weaponModel)
		{
			array_push($return['weaponModels'], array(
				'id' => $weaponModel->getId(),
				'name' => $weaponModel->getName(),
				'shortRange' => $weaponModel->getShortRange(),
				'mediumRange' => $weaponModel->getMediumRange(),
				'longRange' => $weaponModel->getLongRange(),
				'dispersion' => $weaponModel->getDispersion(),
				'width' => $weaponModel->getWidth()
			));
		}

		return ($return);
	}

	public function			gameRefresh(array $datas)
	{
		if (!isset($datas['id']))
			return (FALSE);
		$gameId = intval($datas['id']);

		$events = EventManager::check($gameId);

		return ($events);
	}
}

?>