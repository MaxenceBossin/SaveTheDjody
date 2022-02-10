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
$playerPosition = $game->getPlayer()->playerPosition($map);

// check le déplacement 
$isValidMove = 'false';
while($isValidMove !== 'end'){
    $move        = $game->playerChoice();
    $isValidMove = $game->getPlayer()->checkMoveValide($game->getMap(), $playerPosition , $move);
    if($isValidMove !== 'end'){        
        $map = $game->setMap($isValidMove);
        // on remontre la map apres le mouvement
        $game->showMap();
    }

}


// getmap
