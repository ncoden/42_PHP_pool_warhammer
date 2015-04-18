<?php

if (isset($_POST['gameName']))
{
	$api = new Api();
	$gameId = $api->GameCreate(array(
		'name' => $_POST['gameName'],
	));
	header('Location: /game/'.$gameId);
}
else
	header('Location: /');

?>
<form action = "/game/create" method = "POST">
	<input type = "text" name = "gameName"/>
	<input type = "submit" value = "create"/>
</form>