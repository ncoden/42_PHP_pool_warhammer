<?php

$game_id = array (	
	"players" => array (
		array(
			"id" => 0,
			"name" => "Brian",
			),
		array(
			"id" => 1,
			"name" => "Bastien",
			),
		),
	"shipModels" => array(
		array(
			"id" => 1,
			"name" => "assault/space_marine",
			"width" => 3,
			"height" => 1,
			"sprite" => "a",
			"defaultPP" => 5,
			"defaultHull" => 10,
			"defaultShield" => 5,
			"inerty" => 2,
			"speed" => 5,
			),
		
		array(
			"id" => 2,
			"name" => "chaplain/sorcerer",
			"width" => 3,
			"height" => 1,
			"sprite" => "b",
			"defaultPP" => 5,
			"defaultHull" => 10,
			"defaultShield" => 5,
			"inerty" => 2,
			"speed" => 5,
			),
		array(
			"id" => 3,
			"name" => "d/raptor",
			"width" => 3,
			"height" => 1,
			"sprite" => "c",
			"defaultPP" => 5,
			"defaultHull" => 10,
			"defaultShield" => 5,
			"inerty" => 2,
			"speed" => 5,
			),
		array(
			"id" => 4,
			"name" => "force_commander/aspiring",
			"width" => 3,
			"height" => 1,
			"sprite" => "d",
			"defaultPP" => 5,
			"defaultHull" => 10,
			"defaultShield" => 5,
			"inerty" => 2,
			"speed" => 5,
			),
			array(
			"id" => 5,
			"name" => "greyknights/tanks",
			"width" => 3,
			"height" => 1,
			"sprite" => "e",
			"defaultPP" => 5,
			"defaultHull" => 10,
			"defaultShield" => 5,
			"inerty" => 2,
			"speed" => 5,
			),

			array(
			"id" => 6,
			"name" => "t/chaos_lord",
			"width" => 3,
			"height" => 1,
			"sprite" => "f",
			"defaultPP" => 5,
			"defaultHull" => 10,
			"defaultShield" => 5,
			"inerty" => 2,
			"speed" => 5,
			)
		),
	"ships" => array(
		array(
			"id" => 1,
			"model" => 1,
			"player" => 1,
			"posX" => 134,
			"posY" => 62,
			"active" => 1,
			"state" => 1,
			"weapons" => array(54, 56, 60, 64),
			),
				array(
			"id" => 2,
			"model" => 2,

			"player" => 1,
			"posX" => 134,
			"posY" => 71,
			"active" => 1,
			"state" => 1,
			"weapons" => array(54, 56, 60, 64),
			),
						array(
			"id" => 3,
			"model" => 3,
			"player" => 1,
			"posX" => 134,
			"posY" => 85,
			"active" => 1,
			"state" => 1,
			"weapons" => array(54, 56, 60, 64),
			),
								array(
			"id" => 4,
			"model" => 4,
			"player" => 1,
			"posX" => 135,
			"posY" => 92,
			"active" => 1,
			"state" => 1,
			"weapons" => array(54, 56, 60, 64),
			),
		array(
			"id" => 5,
			"model" => 5,
			"player" => 1,
			"posX" => 116,
			"posY" => 82,
			"width" => 2,
			"height" => 6,
			"active" => 1,
			"state" => 1,
			"weapons" => array(70, 71),
			),
		array(
			"id" => 6,
			"model" => 6,
			"player" => 1,
			"posX" => 116,
			"posY" => 72,
			"width" => 2,
			"height" => 6,
			"active" => 1,
			"state" => 1,
			"weapons" => array(70, 71),
			),
		array(
			"id" => 1,
			"model" => 1,
			"player" => 0,
			"posX" => 1,
			"posY" => 1,
			"active" => 1,
			"state" => 1,
			"weapons" => array(54, 56, 60, 64),
			),
				array(
			"id" => 2,
			"model" => 2,
			"player" => 0,
			"posX" => 23,
			"posY" => 1,
			"active" => 1,
			"state" => 1,
			"weapons" => array(54, 56, 60, 64),
			),
			array(
			"id" => 3,
			"model" => 3,
			"player" => 0,
			"posX" => 42,
			"posY" => 1,
			"active" => 1,
			"state" => 1,
			"weapons" => array(54, 56, 60, 64),
			),
			array(
			"id" => 4,
			"model" => 4,
			"player" => 0,
			"posX" => 1,
			"posY" => 13,
			"active" => 1,
			"state" => 1,
			"weapons" => array(54, 56, 60, 64),
			),
		array(
			"id" => 5,
				"model" => 5,
			"player" => 0,
			"posX" => 23,
			"posY" => 13,
			"width" => 2,
			"height" => 6,
			"active" => 1,
			"state" => 1,
			"weapons" => array(70, 71),
			),
				array(
			"id" => 6,
			"model" => 6,
			"player" => 0,
			"posX" => 1,
			"posY" => 22,
			"width" => 2,
			"height" => 6,
			"active" => 1,
			"state" => 1,
			"weapons" => array(70, 71),
			)
		),
	"elements" => array(
		array(
			"type" => "asteroid",
			"posX" => 108,
			"posY" => 20,
			"width" => 20,
			"height" => 15,
			),
		array(
			"type" => "asteroid",
			"posX" => 78,
			"posY" => 50,
			"width" => 30,
			"height" => 20,
			),
		array(
			"type" => "asteroid",
			"posX" => 46,
			"posY" => 76,
			"width" => 10,
			"height" => 10,
			),
		),
	"weaponModels" => array(
		array(
			"id" => 100,
			"name" => "weapon1",
			"shortRange" => 10,
			"MediumRange" => 20,
			"LongRange" => 30,
			"dispersion" => 0,
			"width" => 1,
			),
			array(
			"id" => 100,
			"name" => "weapon2",
			"shortRange" => 10,
			"MediumRange" => 20,
			"LongRange" => 30,
			"dispersion" => 0,
			"width" => 1,
			)
		)
	);

echo json_encode($game_id);

?>