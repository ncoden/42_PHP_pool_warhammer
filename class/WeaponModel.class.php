<?php

class WeaponModel
{
	private						$_name;
	private						$_short_range;
	private						$_medium_range;
	private						$_long_range;
	private						$_dispersion;
	private						$_width;
	private						$_default_charge;

	public static function		doc()
	{
		return (file_get_contents('./WeaponModel.doc.txt'));
	}

	public static function		__construct(array $kwargs)
	{
		if (isset($kwargs['name']) 
			&& isset($kwargs['short_range']) 
			&& isset($kwargs['medium_range']) 
			&& isset($kwargs['long_range']) 
			&& isset($kwargs['charge_default']) 
			&& isset($kwargs['dispersion']) 
			&& isset($kwargs['width'])) 
		{
			$this->_name = $kwargs['name'];
			$this->_short_range = intval($kwargs['short_range']);
			$this->_medium_range = intval($kwargs['medium_range']);
			$this->_long_range = intval($kwargs['long_range']);
			$this->_dispersion = intval($kwargs['dispersion']);
			$this->_default_charge = intval($kwargs['default_charge']);
			$this->_width = intval($kwargs['width']);
		}
		return ;
	}

	public static function		__destruct()
	{
		return ;
	}
}

?>
