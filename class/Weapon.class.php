<?php

class Weapon extends Licorne
{
	private $_posX;
	private $_posY;
	private $_charge;
	private $_orientation;
	private $_model;
	public static function		doc()
	{
		return (file_get_contents('./Weapon.doc.txt'));
	}
	public static function __construct(array $kwargs)
	{
		if (isset($kwargs['posX'])
			&& isset($kwargs['posY'])
			&& isset($kwargs['charge'])
			&& isset($kwargs['orientation'])
			&& isset($kwargs['model'])
		{
			$this->_model = Game::getWeaponModel($kwargs['model']);
			$this->_posY = intval($kwargs['posY']);
			$this->_posX = intval($kwargs['posX']);
			$this->_orientation = intval($kwargs['orientation']);
			$this->_charge = intval($kwargs['charge']);
		}
		return ;
	}
	public static function __destruct(array $kwargs)
	{
		return ;
	}
}

?>