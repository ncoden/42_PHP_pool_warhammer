<?php

class Game
{
	private $gameId;
	private $winnerId;
	private $state;
	private $playerTurn;
	private $mapId;
	private $bigTurn;
	private $smallTurn;

	public static init()
	{
		$map = new Map();
		$map->GenerateMap();
		DataBase::insert('maps', array(
			"width" => 150,
			"height" => 100,
			"state" => 0);
		$lastIdMap = Database::getLastEntry(""); // trouver dans la database le dernier element inserer
		DataBase::insert('game', array(
			"map_id" => $lastIdMap,
			"winnerId" => 0,
			"state" => 0,
			"playerTurn" => $playerTurn,
			"bigTurn" => $bigTurn,
			"smallTurn" => $smallTurn));
	}

	public function __construct(array $kwargs)
	{
		if (isset($kwargs['gameId'])
			&& isset($kwargs['winnerId'])
			&& isset($kwargs['state'])
			&& isset($kwargs['playerTurn'])
			&& isset($kwargs['mapId'])
			&& isset($kwargs['bigTurn'])
			&& isset($kwargs['smallTurn']))
		{
			$gameId = $kwargs['gameId'];
			$winnerId = $kwargs['winnerId'];
			$state = $kwargs['state'];
			$playerTurn = $kwargs['playerTurn'];
			$mapId = $kwargs['mapId'];
			$bigTurn = $kwargs['bigTurn'];
			$smallTurn = $kwargs['smallTurn'];
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