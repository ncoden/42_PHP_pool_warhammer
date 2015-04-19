<?php

include('Dice.class.php');
include('Game.class.php');
session_start();
  $boolarray = Array(false => 'false', true => 'true');
//print Dice::toss()."\n";
//var_dump(Dice::multi_toss(5));
//print $boolarray[Dice::min_toss(3, 1)]."\n";
  $m_game = new Game();
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
  }
?>