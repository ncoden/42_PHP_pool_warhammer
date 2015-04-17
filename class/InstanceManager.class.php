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
				'owner' => $ship['playerID'],
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
			$_instances['weapons'][$id] = new Ship(array(
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
			));
		}
		return ($_instances['shipModels'][$id]);
	}
}

?>