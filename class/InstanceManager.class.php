<?php

abstract class InstanceManager
{
	private	static			$_instances;

	public static function	init()
	{
		$_instances = [
			'games'				=> [],
			'ships'				=> [],
			'shipModels'		=> [],
			'weapons'			=> [],
			'weaponModels'		=> []
		]
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

			$_instances['ships'][$id] = new Ship(array(
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
		return ($_instances['ships'][$id]);
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

			$_instances['shipModels'][$id] = new Ship(array(
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
		return ($_instances['shipModels'][$id]);
	}

	public static function	getWeapon($id)
	{
		if (!isset(self::$_instances['weapons'][$id]))
		{
			$weapon = DataBase::select('weapons', $id);
			$_instances['weapons'][$id] = new Weapon(array(
				'id' => $id,
				'model' => $weapon['idWeaponModel'],
				'charge' => $weapon['charge']
			));
		}
		return ($_instances['weapons'][$id]);
	}

	public static function	getWeaponModel($id)
	{
		if (!isset(self::$_instances['weapons'][$id]))
		{
			$weaponModel = DataBase::select('weaponsmodel', $id);
			$_instances['weaponModels'][$id] = new WeaponModel(array(
				'id' => $id,
				'name' => $weaponModel['name'],
				'short_range' => $weaponModel['shortRange'],
				'medium_range' => $weaponModel['mediumRange'],
				'long_range' => $weaponModel['longRange'],
				'charge_default' => $weaponModel['defaultCharge'],
				'dispersion' => $weaponModel['dispersion'],
				'width' => $weaponModel['width'])
			));
		}
		return ($_instances['weaponModels'][$id]);
	}

	public static function getGame($id)
	{
		if (!isset(self::$_instances['games'][$id]))
		{
			$game = DataBase::select('games', $id);
			$_instances['games'][$id] = new Game(array(
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
		return ($_instances['games'][$id]);
	}

	public static function getAllShips($gameId)
	{
		$allShips = DataBase::req('SELECT * FROM `ships`
			INNER JOIN `players` ON `ships`.`playerID` = `players`.`id`
			INNER JOIN `weapons` ON `ships`.`id` = `weapons`.`shipId`
			WHERE `players`.`gameId` = ?', array($gameId));

		$tabShips = array();
		foreach ($allShips as $key => $value)
		{
			$weaponsIds = array();
			foreach ($value[`id`] as $weapon)
				array_push($weaponsIds, $weapon[`id`]);
			$ship = new Ship(array(
				'id' => ,
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
			array_push($tabShips, $ship);
		}
		return ($tabShips);
	}
}

?>