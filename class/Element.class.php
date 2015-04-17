<?php


class Element 
{
	private		$_id; 
	private		$_type;
	private		$_posX;
	private		$_posY;
	private		$_width;
	private		$_height;
	private		$_map_id;



	public function				__construct(array $kwargs)
	{
		$this->_id = $kwargs['id'];
		$this->_type = $kwargs['type'];
		$this->_posX = $kwargs['posX'];
		$this->_posY = $kwargs['posY'];
		$this->_width = $kwargs['width'];
		$this->_height = $kwargs['height'];
		$this->_map_id = $wargs['map_id'];
	}

	public function				setPos($x, $y)
	{
		$this->_posX = $x;
		$this->_posY = $y;
	}

	public function				moveTo($x, $y)
	{
		//how is this different from setPos???
	}

	public function				get_id()
	{
		return $this->_id;
	}

	public function				get_type()
	{
		return $this->_type;
	}

	public function				get_posX()
	{
		return $this->_posX;
	}

	public function				get_posY()
	{
		return $this->_posY;
	}

	public function				get_width()
	{
		return $this->_width;
	}

	public function				get_height()
	{
		return $this->_height;
	}

	public function				get_map_id()
	{
		return $this->_map_id;
	}
}


?>