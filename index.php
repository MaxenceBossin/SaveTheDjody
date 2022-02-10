<?php
require_once('link.php');

// initialisation de la map
$player    = new Player();
$game    = new Game($player);
//init de la map
$game->init();
// copie de la map
$game->launch();
$game->showMap();
$playerPosition = $game->getPlayer()->playerPosition($game->getMap());

// check le déplacement 
$isValidMove = false;
while(!$isValidMove){
    $move        = $game->playerChoice();
    $isValidMove = $game->getPlayer()->checkMoveValide($game->getMap(), $playerPosition , $move );
}


// getmap
