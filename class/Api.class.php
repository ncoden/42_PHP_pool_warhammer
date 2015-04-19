<?php

require_once('class/Game.class.php');
require_once('class/InstanceManager.class.php');
require_once('class/User.class.php');

class Api
{
	private					$_return;

	public function			__construct()
	{
		$this->_return = array();
	}

	private function		addToReturn($category, $data)
	{
		if (!isset($this->_return[$category]))
			$this->_return[$category] = array();
		array_push($this->_return[$category], $data);
	}

	private function		addPlayerToReturn($player)
	{
		$this->addToReturn('players', array(
			'id' => $player->getId(),
			'team' => $player->getTeam(),
		));
	}

	private function		addElementToReturn($element)
	{
		$this->addToReturn('elements', array(
			'type' => $element->getType(),
			'posX' => $element->getPosX(),
			'posY' => $element->getPosY(),
			'width' => $element->getWidth(),
			'height' => $element->getHeight(),
		));
	}

	private function		addShipToReturn($game, $ship)
	{
		$this->addToReturn('ships', array(
			'id' => $ship->getId(),
			'player' => $ship->getPlayer(),
			'model' => $ship->getModel(),
			'posX' => $ship->getPosX(),
			'posY' => $ship->getPosY(),
			'orientation' => $ship->getOrientation(),
			'moving' => $ship->getMoving(),
			'hull' => $ship->getHull(),
			'shield' => $ship->getShield(),
			'active' => ($ship->getRound() == $game->getBigTurn()),
			'state' => $ship->getState(),
			'weapons' => $ship->getWeapons(),
		));
	}

	private function		addShipModelToReturn($shipModel)
	{
		$this->addToReturn('shipModels', array(
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

	private function		addWeaponToReturn($weapon)
	{
		$this->addToReturn('weapons', array(
			'id' => $weapon->getId(),
			'model' => $weapon->getModel(),
			'charge' => $weapon->getCharge(),
			'orientation' => $weapon->getOrientation(),
			'posX' => $weapon->getposX(),
			'posY' => $weapon->getposY()
		));
	}

	private function		addWeaponModelToReturn($weaponModel)
	{
		$this->addToReturn('weaponModels', array(
			'id' => $weaponModel->getId(),
			'name' => $weaponModel->getName(),
			'shortRange' => $weaponModel->getShortRange(),
			'mediumRange' => $weaponModel->getMediumRange(),
			'longRange' => $weaponModel->getLongRange(),
			'dispersion' => $weaponModel->getDispersion(),
			'width' => $weaponModel->getWidth()
		));
	}

	public function			request($request, array $datas)
	{
		$methods = [
			'game/create' => 'gameCreate',
			'game/join' => 'gameJoin',
			'game/load' => 'gameLoad',
			'game/refresh' => 'gameRefresh',
			'ship/move' => 'shipMove',
			'ship/fire' => 'shipFire',
		];

		if (isset($methods[$request]))
			return(call_user_func(array($this, $methods[$request]), $datas));
		return (FALSE);
	}

	public function 		gameCreate(array $datas)
	{
		if (isset($datas['name']))
		{
			$gameId = Game::create($datas['name']);
			$this->gameJoin(array('gameId' => $gameId));
			return ($gameId);
		}
		return (FALSE);
	}

	public function 		gameJoin(array $datas)
	{
		if (!isset($datas['gameId']))
			return (FALSE);
		$gameId = $datas['gameId'];

		$auth = User::getAuthId();
		if ($auth)
		{
			Database::insert('players', array(
				'userId' => $auth,
				'gameId' => $gameId
				));
			$playerId = Database::getLastEntry('players');
			Ship::createShips($gameId, $playerId);
		}
		else
			return (FALSE);
	}

	public function			gameLoad(array $datas)
	{
		if (!isset($datas['gameId']))
			return (FALSE);
		$gameId = $datas['gameId'];

		$return = array();

		$game				= InstanceManager::getGame($gameId);
		$players			= InstanceManager::getAllPlayers($gameId);
		$elements			= InstanceManager::getAllElements($gameId);
		$ships				= InstanceManager::getAllShips($gameId);
		$shipModels			= InstanceManager::getAllShipModels($gameId);
		$weapons			= InstanceManager::getAllWeapons($gameId);
		$weaponModels		= InstanceManager::getAllWeaponModels($gameId);

		$this->_return['game'] = array(
			'state' => $game->getState(),
			'bigTurn' => $game->getBigTurn(),
			'smallTurn' => $game->getSmallTurn(),
			'winnerId' => $game->getWinnerId(),
		);

		foreach ($players as $player)
			$this->addPlayerToReturn($player);
		foreach ($elements as $element)
			$this->addElementToReturn($element);
		foreach ($ships as $ship)
			$this->addShipToReturn($game, $ship);
		foreach ($shipModels as $shipModel)
			$this->addShipModelToReturn($shipModel);
		foreach ($weapons as $weapon)
			$this->addWeaponToReturn($weapon);
		foreach ($weaponModels as $weaponModel)
			$this->addWeaponModelToReturn($weaponModel);
	}

	public function			gameRefresh(array $datas)
	{
		if (!isset($datas['gameId']))
			return (FALSE);
		$gameId = $datas['gameId'];

		$return = array();
		$events = EventManager::check();

		foreach ($events as $event)
		{
			if ($event == 'game_start')
			{
				
			}
			array_push($return, array(
				'name' => $event['name'],
				'datas' => $datas
			));
		}

		return ($return);
	}

	public function			getReturn()
	{
		return ($this->_return);
	}
}

?>