<?php

abstract class EventManager
{
	private static					$_events;

	public static function			trigger($gameId, $event, $data)
	{
		return (DataBase::insert('events', array(
			'gameId' => $gameId,
			'name' => $event,
			'data' => $data 
		)));
	}

	public static function			check($gameId)
	{
		if (!isset($_SESSION['event_timestamps']))
			$_SESSION['event_timestamp'] = array();
		if (!isset($_SESSION['event_timestamps'][$gameId]))
			$_SESSION['event_timestamp'][$gameId] = 0;

		$events = DataBase::req(
			'SELECT * FROM `events` WHERE `gameId` = ? AND `timestamp` > ?',
			array($gameId, $_SESSION['event_timestamps'][$gameId])
		);

		$_SESSION['event_timestamps'][$gameId] = time();
		return ($events);
	}
}

?>