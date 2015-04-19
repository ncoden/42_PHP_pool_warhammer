<?php

require_once('class/EventManager.class.php');

abstract class Licorne
{
	private static				$_map;
	private						$_moving;
	private						$_posX;
	private						$_posY;

	public static function		doc()
	{
		return (file_get_contents('./Licorne.doc.txt'));
	}

	public function			checkCollision($xmin, $ymin, $xmax, $ymax, $obj)
	{
		if ($xmin < 0 || $xmax > 150)
			return FALSE;
		if ($ymin < 0 || $ymax > 100)
			return FALSE;
		if (($xmax < $obj->_posX))
			return FALSE;
		if (($xmin > ($obj->_posX + $obj->_model->getWidth())))
			return FALSE;
		if (($ymax < $obj->_posY))
			return FALSE;
		if (($ymin > ($obj->_posX + $obj->_model->getHeight())))
			return FALSE;
		return TRUE;
	}

	public function				setPos($x, $y)
	{
		if ($this->_map === NULL)
		{
			$this->_map = array('Ships' => array(), 'Elements' => array());
		}

		if (isset($x) && isset($y))
		{
			$this->_posX = $x;
			$this->_posY = $y;
			if (is_a($this, Ship) === TRUE)
				$this->_map['Ships'][$this->_id] = $this;
			if (is_a($this, Elements) === TRUE)
				$this->_map['Elements'][$this->_id] = $this;
		}
	}

	public function				moveTo($x, $y)
	{
		$xmin = $this->_posX;
		$ymin = $this->_posY;
		$xmax = $this->_posX + $this->_model->getWidth();
		$ymax = $this->_posY + $this->_model->getHeight();
		if ($x == $this->_posX && $y == $this->_posY)
		{
			$this->_moving = FALSE;
			return ;
		}
		if ($x == $this->_posX)
		{
			$this->_moving = TRUE;
			$stop = 0;
			for ($yi = 0; $yi < $y; $yi++)
			{
				foreach($map['Ships'] as $key => $value)
				{
					if (checkCollision($xmin, $ymin + $yi, $xmax, $ymax + $yi, $value) == TRUE)
					{
						$value->inflictDamages($value->_hull);
						$this->inflictDamages($this->_hull);
						if ($ymin + $yi < 0)
							$this->_posY = 0;
						else if ($ymax + $yi > 100)
							$this->_posY = 100;
						else
							$this->_posY = $ymin + $yi - 1;
					}
				}

				foreach($map['Elements'] as $key => $value)
				{
					if (checkCollision($xmin, $ymin + $yi, $xmax, $ymax + $yi, $value) == TRUE)
					{
						$this->inflictDamages($value->_hull);
						if ($ymin + $yi < 0)
							$this->_posY = 0;
						else if ($ymax + $yi > 100)
							$this->_posY = 100;
						else
							$this->_posY = $ymin + $yi - 1;
					}
				}
				if ($stop == 1)
				{
					DataBase::update('ships', $this->_id, array(
						'posX' => $this->_posX,
						'posY' => $this->_posY
					));
					break;
				}
			}

			return ;
		}

		if ($y == $this->_posY)
		{
			$this->_moving = TRUE;
			$stop = 0;
			for ($xi = 0; $xi < $x; $xi++)
			{
				foreach($map['Ships'] as $key => $value)
				{
					if (checkCollision($xmin + $xi, $ymin, $xmax + $xi, $ymax, $value) == TRUE)
					{
						$value->inflictDamages($this->_hull);
						$this->inflictDamages($value->_hull);
						$stop = 1;
					}
					if ($xmin + $xi < 0)
						$this->_posX = 0;
					else if ($xmax + $xi > 100)
						$this->_posX = 100;
					else
						$this->_posX = $xmin + $xi - 1;
				}

				foreach($map['Elements'] as $key => $value)
				{
					if (checkCollision($xmin + $xi, $ymin, $xmax + $xi, $ymax, $value) == TRUE)
					{
						$this->inflictDamages($value->_hull);
						$stop = 1;
					}
					if ($xmin + $xi < 0)
						$this->_posX = 0;
					else if ($xmax + $xi > 100)
						$this->_posX = 100;
					else
						$this->_posX = $xmin + $xi - 1;
				}
				if ($stop == 1)
				{
					DataBase::update('ships', $this->_id, array(
						'posX' => $this->_posX,
						'posY' => $this->_posY
					));
					break;
				}
			}
			EventManager::trigger('ship_moved', $this->_id);
			return ;
		}
	}

	public function				getPosX()	{ return ($this->_posX); }
	public function				getPosY()	{ return ($this->_posY); }
}

?>

