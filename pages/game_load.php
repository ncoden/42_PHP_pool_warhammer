<?php

if (isset($g_path) && isset($g_path[1]))
	$gameId = intval($g_path[1]);

if (!isset($gameId))
	header('Location: /');


require_once('class/Api.class.php');
$api = new Api();
var_dump($api->gameLoad(array(
	'id' => $gameId
)));

?>
