<?php
require_once('link.php');

// initialisation de la map
$player    = new Player();
$game    = new Game($player);

//init de la map
$game->init();
$map = $game->getMap();
// copie de la map
$game->launch();
$game->showMap();
// $playerPosition = $game->getPlayer()->playerPosition($game->getMap());


// check le déplacement 

while($map !== 'end'){
    $move        = $game->playerChoice();
    $playerPosition = $game->getPlayer()->playerPosition($map);
    $map = $game->getPlayer()->checkMoveValide($game->getMap(), $playerPosition , $move);
    print_r($map);
    if($map === 'end'){
        break;
    }else {
        $game->setMap($map);
        // on remontre la map apres le mouvement
        $game->showMap();
    }  

}


// getmap
