<?php

Abstract Class EventManager
{
	public static function trigger($event_to_add, $id)
	{
		DataBase::insert('events', $id);
		return ;
	}
	
	public static function check()
	{
		if (($ret = DataBase::select('SELECT * FROM events WHERE `timestamp` > "'.$NOW().'"')) == NULL)
			return (NULL);
		else
			return ($ret);
	}
}

?>