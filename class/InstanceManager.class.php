<?php

abstract class InstanceManager
{
	private	static			$_instances;

	public static function	init()
	{
		if (!isset($_instances))
		{
			self::$_instances = [
				'games'				=> [],
				'ships'				=> [],
				'shipModels'		=> [],
				'weapons'			=> [],
				'weaponModels'		=> [],
				'players'           => []
			];
		}
	}

	public static function	getShip($id)
	{
		if (!isset(self::$_instances['ships'][$id]))
		{
			$ship = DataBase::select('ships', $id);
			$weapons = DataBase::req('SELECT * FROM weapons WHERE shipId = ?', array($id));

			$weaponsIds = array();
			foreach ($weapons as $weapon)
				array_push($weaponsIds, $weapon['id']);

			self::$_instances['ships'][$id] = new Ship(array(
				'id' => $id,
				'model' => $ship['idShipModel'],
				'player' => $ship['playerID'],
				'posX' => $ship['posX'],
				'posY' => $ship['posY'],
				'orientation' => $ship['orientation'],
				'moving' => $ship['moving'],
				'pp' => $ship['pp'],
				'speed' => $ship['speed'],
				'hull' => $ship['hull'],
				'shield' => $ship['shield'],
				'weapons' => $weaponsIds
			));
		}
		return (self::$_instances['ships'][$id]);
	}

	public static function	getPlayers($id)
	{
		if (!isset(self::$_instances['players'][$id]))
		{
			$players = DataBase::select('players', $id);

			self::$_instances['players'][$id] = new Ship(array(
				'id' => $id,
				'userId' => $players['userId'],
				'gameId' => $players['gameId']
			));
		}
		return (self::$_instances['players'][$id]);
	}

	public static function	getShipModel($id)
	{
		if (!isset(self::$_instances['shipModels'][$id]))
		{
			$shipModel = DataBase::select('shipsmodel', $id);
			$weaponModels = DataBase::req('SELECT * FROM weaponsshipsrelations WHERE shipId = ?', array($id));

			$weaponsIds = array();
			foreach ($weaponModels as $weaponModel)
				array_push($weaponsIds, $weaponModel['id']);

			self::$_instances['shipModels'][$id] = new Ship(array(
				'id' => $id,
				'name' => $shipModel['name'],
				'width' => $shipModel['width'],
				'height' => $shipModel['height'],
				'sprite' => $shipModel['sprite'],
				'default_pp' => $shipModel['defaultPp'],
				'default_hull' => $shipModel['defaultHull'],
				'default_shiel' => $shipModel['defaultShield'],
				'inerty' => $shipModel['inertia'],
				'speed' => $shipModel['speed'],
				'weapons' => $weaponModels
			));
		}
		return (self::$_instances['shipModels'][$id]);
	}

	public static function	getWeapon($id)
	{
		if (!isset(self::$_instances['weapons'][$id]))
		{
			$weapon = DataBase::select('weapons', $id);
			self::$_instances['weapons'][$id] = new Weapon(array(
				'id' => $id,
				'model' => $weapon['idWeaponModel'],
				'charge' => $weapon['charge']
			));
		}
		return (self::$_instances['weapons'][$id]);
	}

	public static function	getWeaponModel($id)
	{
		if (!isset(self::$_instances['weapons'][$id]))
		{
			$weaponModel = DataBase::select('weaponsmodel', $id);
			self::$_instances['weaponModels'][$id] = new WeaponModel(array(
				'id' => $id,
				'name' => $weaponModel['name'],
				'short_range' => $weaponModel['shortRange'],
				'medium_range' => $weaponModel['mediumRange'],
				'long_range' => $weaponModel['longRange'],
				'charge_default' => $weaponModel['defaultCharge'],
				'dispersion' => $weaponModel['dispersion'],
				'width' => $weaponModel['width']
			));
		}
		return (self::$_instances['weaponModels'][$id]);
	}

	public static function getGame($id)
	{
		if (!isset(self::$_instances['games'][$id]))
		{
			$game = DataBase::select('games', $id);
			self::$_instances['games'][$id] = new Game(array(
				'id' => $id,
				'timestamp' => $game['timestamp'],
				'winnerId' => $game['winnerId'],
				'state' => $game['state'],
				'playerTurn' => $game['playerTurn'],
				'mapId' => $game['mapId'],
				'bigTurn' => $game['bigTurn'],
				'smallTurn' => $game['smallTurn']

			));
		}
		return (self::$_instances['games'][$id]);
	}

	public static function getAllShips($gameId)
	{
		self::$_instances['ships'] = array();
		$allShips = DataBase::req('SELECT * FROM `ships`
			INNER JOIN `players` ON `ships`.`playerID` = `players`.`id`
			WHERE `players`.`gameId` = ?', array($gameId));

		foreach ($allShips as $key => $value)
		{
			$weapons = DataBase::req('SELECT * FROM weapons WHERE shipId = ?', array($value['id']));
			$weaponsIds = array();
			foreach ($weapons as $weapon)
				array_push($weaponsIds, $weapon['id']);

			$ship = new Ship(array(
				'id' => $value['id'],
				'model' => $value['idShipModel'],
				'player' => $value['playerID'],
				'posX' => $value['posX'],
				'posY' => $value['posY'],
				'orientation' => $value['orientation'],
				'moving' => $value['moving'],
				'pp' => $value['pp'],
				'speed' => $value['speed'],
				'hull' => $value['hull'],
				'shield' => $value['shield'],
				'weapons' => $weaponIds
			));
			self::$_instances['ships'][$value['id']] = $ship;
		}
		return (self::$_instances['ships']);
	}

	public static function getAllPlayers($gameId)
	{
		self::$_instances['players'] = array();
		$allPlayers = DataBase::req('SELECT * FROM `players`
			INNER JOIN `games` ON `players`.`gameId` = `games`.`id`
			WHERE `players`.`gameId` = ?', array($gameId));

		foreach ($allPlayers as $key => $value)
		{
			$players = new Ship(array(
				'id' => $value['id'],
				'userId' => $value['userId'],
				'gameId' => $value['gameId'],
			));
			self::$_instances['players'][$value['id']] = $players;
		}
		return (self::$_instances['players']);
	}

	public static function getAllShipModel($gameId)
	{
		self::$_instances['shipModels'] = array();
		$allShipModel = DataBase::req('SELECT * FROM `shipsmodel`
			INNER JOIN `ships` ON `ships`.`idShipsModel` = `shipsmodel`.`id`
			INNER JOIN `players` ON `ships`.`playerID` = `players`.`id`
			INNER JOIN `games` ON `players`.`gameId` = `games`.`id`
			WHERE `games`.`id` = ?', array($gameId));

		foreach ($allShipModel as $key => $value)
		{
			$shipModel = DataBase::select('shipsmodel', $id);
			$weaponModels = DataBase::req('SELECT * FROM weaponsshipsrelations WHERE shipId = ?', array($id));

		}
	//	array_push($weaponsIds, $weaponModel['id']);

		self::$_instances['shipModels'][$value['id']}] = new Ship(array(
			'id' => $id,
			'name' => $shipModel['name'],
			'width' => $shipModel['width'],
			'height' => $shipModel['height'],
			'sprite' => $shipModel['sprite'],
			'default_pp' => $shipModel['defaultPp'],
			'default_hull' => $shipModel['defaultHull'],
			'default_shiel' => $shipModel['defaultShield'],
			'inerty' => $shipModel['inertia'],
			'speed' => $shipModel['speed'],
			'weapons' => $weaponModels
		));
		}
		return (self::$_instances['shipModels'][$id]);
	}
}

?>