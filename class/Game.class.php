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
	const						GAME_EQUAL = 0;
	const						INGAME = 1;
	const						GAME_FINISHED = 2;

	public static				create()
	{
		$map = new Map();
		$map->GenerateMap();

		DataBase::insert('maps', array(
			'width' => 150,
			'height' => 100,
			'state' => 0
		));

		$lastIdMap = Database::getLastEntry('games'); // trouver dans la database le dernier element inserer
		DataBase::insert('games', array(
			'map_id' => $lastIdMap,
			'winnerId' => null,
			'state' => 1,
			'playerTurn' => 0,
			'bigTurn' => 0,
			'smallTurn' => 0
		));
	}

	public function				__construct(array $kwargs)
	{
		if (isset($kwargs['id'])
			&& isset($kwargs['winnerId'])
			&& isset($kwargs['state'])
			&& isset($kwargs['playerTurn'])
			&& isset($kwargs['mapId'])
			&& isset($kwargs['bigTurn'])
			&& isset($kwargs['smallTurn']))
		{
			$this->_gameId = $kwargs['id'];
			$this->_winnerId = $kwargs['winnerId'];
			$this->_state = $kwargs['state'];
			$this->_playerTurn = $kwargs['playerTurn'];
			$this->_mapId = $kwargs['mapId'];
			$this->_bigTurn = $kwargs['bigTurn'];
			$this->_smallTurn = $kwargs['smallTurn'];
		}
	}

	public function				checkEnd($id)
	{
		$allShip = InstanceManager::getAllShip($id);
		var $fighter = 0;
		var $check = 0;
		var $id_winner = 0;

		foreach ($allship as $key => $value)
		{
			if ($fighter == 0)
			{
				if ($value->_player != 0)
					$fighter = $value->_player;
			}
			else
			{
				if ($fighter == $value->_player)
				{
					if ($value->state == Ship::STATE_OK)
						$check++;
					if ($check == 1)
						$id_winner = $value->_player;
				}
				else
				{
					if ($value->state == Ship::STATE_OK)
						$check++;
					if ($check == 1)
						$id_winner = $value->_player;
				}
			}
		}

		if ($check == 0)
			return (array(GAME_EQUAL, 0));
		else if ($check == 1)
			return (array(GAME_FINISHED, $winner_id))
		else
			return (array(INGAME, 0));
	}
}

?>
