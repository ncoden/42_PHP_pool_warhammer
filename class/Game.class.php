<?php

class Game
{
	private						$_gameId;
	private						$_winnerId;
	private						$_state;
	private						$_playerTurn;
	private						$_mapId;
	private						$_bigTurn;
	private						$_smallTurn;

	public static				create()
	{
		$map = new Map();
		$map->GenerateMap();

		DataBase::insert('maps', array(
			"width" => 150,
			"height" => 100,
			"state" => 0
		));

		$lastIdMap = Database::getLastEntry('games'); // trouver dans la database le dernier element inserer
		DataBase::insert('games', array(
			"map_id" => $lastIdMap,
			"winnerId" => 0,
			"state" => 0,
			"playerTurn" => 0,
			"bigTurn" => 0,
			"smallTurn" => 0
		));
	}

	public function				__construct(array $kwargs)
	{
		if (isset($kwargs['gameId'])
			&& isset($kwargs['winnerId'])
			&& isset($kwargs['state'])
			&& isset($kwargs['playerTurn'])
			&& isset($kwargs['mapId'])
			&& isset($kwargs['bigTurn'])
			&& isset($kwargs['smallTurn']))
		{
			$this->_gameId = $kwargs['gameId'];
			$this->_winnerId = $kwargs['winnerId'];
			$this->_state = $kwargs['state'];
			$this->_playerTurn = $kwargs['playerTurn'];
			$this->_mapId = $kwargs['mapId'];
			$this->_bigTurn = $kwargs['bigTurn'];
			$this->_smallTurn = $kwargs['smallTurn'];
		}
	}


/*
	public function Victory()
	{
		$element = Licorne::getMap();
		foreach ($element['Ships'] as $key => $value)
		{
			if ($value->_owner)
			{

			}
		}
		$ship->state = Ship::STATE_KILLED;
	}
*/
}

?>