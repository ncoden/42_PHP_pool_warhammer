<?php

require_once('Licorne.class.php');

class Ship extends Licorne
{
	private						$_id;
	private						$_model;
	private						$_owner;
	private						$_orientation;
	private						$_moving;
	private						$_pp;
	private						$_hull;
	private						$_shield;
	private						$_weapons;

	public static function		doc()
	{
		return (file_get_contents('Ship.doc.txt'));
	}

	public function				__construct(array $kwargs)
	{
		if (isset($kwargs['id'])
			&& isset($kwargs['model'])
			&& isset($kwargs['owner'])
			&& isset($kwargs['posX'])
			&& isset($kwargs['posY'])
			&& isset($kwargs['orientation'])
			&& isset($kwargs['moving'])
			&& isset($kwargs['pp'])
			&& isset($kwargs['hull'])
			&& isset($kwargs['shield'])
			&& isset($kwargs['weapons']))
		{
			$this->_id = $kwargs['id'];
			$this->_model = Game::getShipModel($kwargs['model']);
			$this->_owner = $kwargs['owner'];
			$this->setPos(intval($kwargs['posX']), intval($kwargs['posY']));
			$this->_orientation = intval($kwargs['orientation']);
			$this->_moving = intval($kwargs['moving']);
			$this->_pp = intval($kwargs['pp']);
			$this->_hull = intval($kwargs['hull']);
			$this->_shield = intval($kwargs['shield']);

			$this->_weapons = array();
			foreach ($kwargs['weapons'] as $weapon)
				array_push($this->_weapons, new Weapon($weapon));
		}
	}
}

?>