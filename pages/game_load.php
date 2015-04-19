<?php
if (isset($g_path) && isset($g_path[0]))
	$gameId = intval($g_path[0]);

if (!isset($gameId))
	header('Location: /');

?>
<!DOCTYPE HTML>
<html lang=''>
<head>
	<meta charset='utf-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/resources/css/index.css">
	<link rel="stylesheet" href="/resources/css/signup.css">
	<link rel="stylesheet" href="/resources/css/buttons_login.css">
	<title>MAP TEST</title>
</head>

<body onload="init();">
<canvas id="Warhammer" width="1695" height="1000" style="background-color: grey;"></canvas>
<script src="https://code.createjs.com/easeljs-0.8.0.min.js"></script>
<script src="https://code.createjs.com/tweenjs-0.6.0.min.js"></script>
<script src="https://code.createjs.com/soundjs-0.6.0.min.js"></script>
<script src="/resources/js/Map.js" type="text/javascript"></script>
<script src="/resources/js/Ship.js" type="text/javascript"></script>
<script src="/resources/js/Ajax.js" type="text/javascript"></script>
<script src="/resources/js/Events.js" type="text/javascript"></script>
<script src="/resources/js/BoundingBoxHitTest.js" type="text/javascript"></script> 
<script>


  var gameId = <?php echo($gameId); ?>;
  var stage;
  var direction = "up";
  var tmpship;
  function init()
  {
	  var stage = new createjs.Stage("Warhammer");
	  stage.enableMouseOver(50);
	  Events_init(stage);
	  generateGrid(stage);
	  generateText_Info(stage);
	  tmpship = new Ship(1, 0, "test", 15, 8, 'a', 1,2,3,4,5, 0,0);
	  tmpship.rendership(stage);
	  tmpship.Makeclickable(stage);	 
	  createjs.Ticker.setInterval(25);
	  createjs.Ticker.setFPS(60);
	  createjs.Ticker.addEventListener("tick", handleTick);
	   AJAX_game_id(gameId);
	  function handleTick(event)
	  {
		  tmpship.setRotation(direction);

			stage.update();
			if (FLAG_Setup_Ships)
			{
				Event_Render_Map_Ships();
				FLAG_Setup_Ships = false;
			}
	  }
	  
	   window.addEventListener('keydown', whatKey, true);  
  }
  function whatKey(event)
  {
	switch (event.keyCode)
	{
		// left arrow
		case 37:
			direction = ship_rotation.LEFT;
			tmpship.tweenPos_Map(tmpship.mapX - 5, tmpship.mapY);
			break;
			// right arrow
		case 39:
			direction = ship_rotation.RIGHT;
			tmpship.tweenPos_Map(tmpship.mapX + 5, tmpship.mapY);
			break;
			// down arrow
		case 40:
			direction = ship_rotation.DOWN;
			 tmpship.tweenPos_Map(tmpship.mapX , tmpship.mapY + 5);
			 
			break;
			// up arrow 
		case 38:
			direction = ship_rotation.UP;
			tmpship.tweenPos_Map(tmpship.mapX , tmpship.mapY - 5);
			break;
	}
  }
</script>
</body>
</html>
