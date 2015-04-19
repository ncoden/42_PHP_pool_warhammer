<?php

require_once('class/Api.class.php');

$api = new Api();

$return = $api->request($g_path[0], $_POST);
echo (json_encode($return));

?>