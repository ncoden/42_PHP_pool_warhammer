<?php

class ShipModel
{
	private						$_width;
	private						$_height;
	private						$_sprite;
	private						$_default_pp;
	private						$_default_hull;
	private						$_default_shield;
	private						$_inerty;
	private						$_speed;
	private						$_weapons;

	public static function		doc()
	{
		return (file_get_contents('ShipModel.doc.txt'));
	}

	public function				__construct(array $kwargs)
	{
		if (isset($kwargs['name'])
			&& isset($kwargs['width'])
			&& isset($kwargs['height'])
			&& isset($kwargs['sprite'])
			&& isset($kwargs['default_pp'])
			&& isset($kwargs['default_hull'])
			&& isset($kwargs['default_shield'])
			&& isset($kwargs['inerty'])
			&& isset($kwargs['speed'])
			&& isset($kwargs['weapons']))
		{
			$this->_name = $kwargs['name'];
			$this->_width = intval($kwargs['width']);
			$this->_height = intval($kwargs['height']);
			$this->_sprite = $kwargs['sprite'];
			$this->_default_pp = intval($kwargs['default_pp']);
			$this->_default_hull = intval($kwargs['default_hull']);
			$this->_default_shield = intval($kwargs['default_shield']);
			$this->_inerty = intval($kwargs['inerty']);
			$this->_speed = intval($kwargs['speed']);
			$this->_weapons = $kwargs['weapons'];
		}
	}
}

?>