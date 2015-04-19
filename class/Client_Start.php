<!DOCTYPE html>

<html lang=''>
<head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/buttons_login.css">
    <title>MAP TEST</title>
</head>

<body onload="init();">
<canvas id="Warhammer" width="1695" height="1000" style="background-color: grey;"></canvas>
<script src="https://code.createjs.com/easeljs-0.8.0.min.js"></script>
<script src="https://code.createjs.com/tweenjs-0.6.0.min.js"></script>
<script src="https://code.createjs.com/soundjs-0.6.0.min.js"></script>
<script src="client/Map.js" type="text/javascript"></script>
<script src="client/Ship.js" type="text/javascript"></script> 
<script src="client/BoundingBoxHitTest.js" type="text/javascript"></script> 
<script>
  var stage;
  var direction = "up";
    var tmpship;
  function init()
  {
      // code here.
      var stage = new createjs.Stage("Warhammer");
      stage.enableMouseOver(50);
      generateGrid(stage);
      
      tmpship = new Ship(1, 0, "test", 15, 8, 'a', 1,2,3,4,5, 0,0);
      tmpship.rendership(stage);
   

      createjs.Ticker.setInterval(25);
      createjs.Ticker.setFPS(60);
      createjs.Ticker.addEventListener("tick", handleTick);
  
      function handleTick(event)
      {
          tmpship.setRotation(direction);
          stage.update();
      }
      
       window.addEventListener('keydown', whatKey, true);  
  }
  function whatKey(event)
  {
    switch (event.keyCode) {
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
<?php
session_start();
include('Dice.class.php');
include('Map.class.php');
$boolarray = Array(false => 'false', true => 'true');

//print Dice::toss()."\n";
//var_dump(Dice::multi_toss(5));
//print $boolarray[Dice::min_toss(3, 1)]."\n";
  /*$m_game = new Map();
  $m_game->GenerateMap();

  $rendermode = 2;
  if ($rendermode == 1)
  {
      echo "<table class=\"myTable\" cellspacing=\"0\" cellpadding = \"0\">";
      $m_game->RenderMap();
      echo "</table>";
  }
  else
  {
      echo "<div class=\"map_container\">";
      $m_game->RenderMap2();
      echo "</div>";
  }*/

?>


</body>
</html>
