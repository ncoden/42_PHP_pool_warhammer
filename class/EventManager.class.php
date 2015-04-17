<?php

Abstract Class EventManager
{
	public static function trigger($event, $data)
	{
		return (DataBase::insert('events', array(
			'name' => $event,
			'data' => $data 
		)));
	}
	
	public static function check()
	{
		$ret = DataBase::req('SELECT * FROM `events` WHERE `timestamp` > NOW()');
		return ($ret);
	}
}

?>