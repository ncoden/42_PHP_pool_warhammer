<?php
require_once('Element.class.php');

class Game
{
	private static	$_map_id;
	private			$_map_width;
	private			$_map_height;
	private			$_map_p1_zone_posX; //upper left hand coordinates
	private			$_map_p1_zone_posY;
	private			$_map_p2_zone_posX; //upper left hand coordinates
	private			$_map_p2_zone_posY;
	private			$_map_p_zone_width;
	private			$_map_p_zone_height;
	private			$_map_elements;
	private			$_asteroid_probability;
	private			$_element_types;
	private			$TILE_EMPTY;
	private			$TILE_ASTEROID;
	private			$TILE_P1;
	private			$TILE_P2;

	public static function		doc()
	{
		return (file_get_contents('Game.doc.txt'));
	}

	function					__construct()
	{
		$this->_map_width = 150;
		$this->_map_height = 100;
		$this->_map_id = 0;
		$this->_map_p1_zone_posX = 0;
		$this->_map_p1_zone_posY = 0;
		$this->_map_p2_zone_posX = 135;
		$this->_map_p2_zone_posY = 85;
		$this->_map_p_zone_height = 15;
		$this->_map_p_zone_width = 15;
		$this->_element_types = Array('p1' => 0,'p2' => 1, 'empty' => 2, 'asteroid' => 3);
		$this->TILE_EMPTY = "http://".$_SERVER['HTTP_HOST']."/resource/space-tile.jpg";
		$this->TILE_ASTEROID = "http://".$_SERVER['HTTP_HOST']."/resource/Spinning-asteroid-1.gif";
		$this->TILE_P1 = "http://".$_SERVER['HTTP_HOST']."/resource/player1.png";
		$this->TILE_P2 = "http://".$_SERVER['HTTP_HOST']."/resource/player2.png";
		$this->_asteroid_probability = 2;
	}

	function					__destruct()
	{

	}

	public function				GenerateMap()
	{
		$element_id = 0;
		$this->_map_elements = array();
		echo ("test".$this->_map_width." ".$this->_map_height."\n");

		for ($i = 0; $i < $this->_map_width; $i++)
		{
			$map_elements_y = array();
			for ($j = 0; $j < $this->_map_height; $j++)
			{

				$element_type = $this->_element_types['empty'];
				//ensure that random element types are only generated OUTSIDE of player SPAWN ZONES
				$prob = rand(0, 1000);
				if ($prob < $this->_asteroid_probability)
					$element_type = $this->_element_types['asteroid'];
				if ($i >= $this->_map_p1_zone_posX && $i <= ($this->_map_p1_zone_posX + $this->_map_p_zone_width))
					if ($j >= $this->_map_p1_zone_posY && $j <= ($this->_map_p1_zone_posY + $this->_map_p_zone_height))
						$element_type = $this->_element_types['p1'];
				if ($i >= $this->_map_p2_zone_posX && $i <= ($this->_map_p2_zone_posX + $this->_map_p_zone_width))
					if ($j >= $this->_map_p2_zone_posY && $j <= ($this->_map_p2_zone_posY + $this->_map_p_zone_height))
						$element_type = $this->_element_types['p2'];
				$current_element = new Element(array(
					'id' => $element_id,
					'type' => $element_type,
					'posX' => $i,
					'posY' => $j,
					'width' => 10, // Hard coded for now....
					'height' => 10,
					'map_id' => ($this->_map_id)
					));
				$element_id++;
				$map_elements_y[$j] = $current_element;

			}
			$this->_map_elements[$i] = $map_elements_y;
		}
		$this->_map_id++;
	}

	public function				RenderMap()
	{
		$current_y = 0;
		while ($current_y < $this->_map_height)
		{
			echo("<tr>");
			for ($i = 0; $i < count($this->_map_elements); $i++)
			{
				echo("<td>");
				echo ("<img style=\"width:10px; height:10px;\" src=\"");
				if ($this->_map_elements[$i][$current_y]->get_type() == $this->_element_types['p1'])
					echo ($this->TILE_P1);
				else if ($this->_map_elements[$i][$current_y]->get_type() == $this->_element_types['p2'])
					echo ($this->TILE_P2);
				else if ($this->_map_elements[$i][$current_y]->get_type() == $this->_element_types['empty'])
					echo ($this->TILE_EMPTY);
				else if ($this->_map_elements[$i][$current_y]->get_type() == $this->_element_types['asteroid'])
					echo ($this->TILE_ASTEROID);
				echo ("\"/>");
				echo "</a>";
				echo("</td>");
				
			
			}
			$current_y = $current_y + 1;
			echo("</tr>");
		}
	
		
	}

	private function			SaveMapInDatabase($theMap)
	{

	}

}

?>