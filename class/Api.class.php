<?php

class Api
{
	public function			__construct()
	{

	}

	private function		checkPlayerRight($userId = NULL)
	{
		$game = InstanceManager::

	}

	public function			request($request, $datas)
	{
		$methods = [
			'game/create' => 'GameCreate',
			'game/load' => 'GameLoad',
			'game/refresh' => 'GameRefresh',
			'ship/move' => 'ShipMove',
			'ship/fire' => 'ShipFire',
		]

		if (isset($methods[$request]))
			return(call_user_func('self::'.$methods[$request], $datas))
		return (FALSE);
	}

}

?>