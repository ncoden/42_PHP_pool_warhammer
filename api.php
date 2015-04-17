<?php

require_once('../class/Api.class.php');

$return = Api::request($g_path[1], $_POST);
echo (json_encode($return));

?>