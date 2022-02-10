<?php
class Player {
    protected $items;

    
    function __construct(){
        $this->items  = [];
    }

    public function getItems(){
        return $this->items;
    }

    public function setItems($items){
        $this->items = $items;
    }


    // position du player
    public function playerPosition($map)
    {
        $position = [0,0];
        for($line = 0; $line < count($map); $line++){
            for($cell = 0; $cell < count($map[$line]); $cell++){
                if($map[$line][$cell] === 'P'){
                    $position=[$line, $cell];
                    echo "tu es actuellement en postion  : ";
                    print_r($position);                    
                }
            }
            echo "\n";
        }
        return $position;
    }
    // prend la map, la postion, et le chartère par quoi on va changer
    private function changeMap( $map,int $vertical,int $horizontal, $change)
    {   
        $map[$vertical][$horizontal] = $change ;
        return $map;
    }

    public function checkMoveValide($map, $position, $move)
    {   
        $isValidMove = false;
        echo "Carte : ";
        echo "\n";
        print_r($map);
        echo "position : ";
        echo "\n";
        print_r($position);
        echo "Carte : ";
        echo "\n";
        print_r($move);
        // On test de faire la nouvelle position on la verefie apres si c'est ok ou non
        // si ok on change la position plus la map
        // si KO on annule la position et on rappelle la fonction playerChoice pour que Djody 
        // se déplace denouveaux
        // à changer les key 4 et 5
        $vertical   = $position[0]+$move[0];
        $horizontal = $position[1]+$move[1];
        $newPossition = [$vertical,$horizontal];
        //
        if($vertical == -1 || $vertical == 4){
            // on anule
            echo'tu ne peux pas aller par là';
            echo "\n";

        }elseif($horizontal == -1 || $horizontal == count($map[0])){
            // on anule
            echo'tu ne peux pas aller par là';
            echo "\n";
        }else{
            // on verif si dans la nouvelle position il n'y a pas de mur
            // si OK on change la map
            // si KO on rappele la fonction 
            if($map[$vertical][$horizontal] === 1){
                echo'Il y a un mur débile, fait gaff Dimitry est pas loins !';
                echo "\n";
            }elseif($map[$vertical][$horizontal] === 'K'){
                echo'Bravo tu as trouvé ton fidèle panneau stop  !';
                echo "\n";
                echo'Maintenant on sort !';
                echo "\n";
                // faire une méthode pour que le perso est le panneaux
                // novelle map
                // la position actuelle devient 0
                $map = $this->changeMap($map,$position[0], $position[1],0);
                // la nouvelle position  devient P (celle du joueur)
                $map = $this->changeMap($map,$vertical, $horizonta,'P');
                return $map;

            }elseif($map[$vertical][$horizontal] === 'E'){
                echo'C la sorti !';
                echo "\n";
                echo'Defonce la porte  !';
                echo "\n";
                //tester si on a le panneau
                // sinon on se fait areter par dimitri
                // sinon on fait la rev
                $isValidMove = true;

            }else{
                echo'OK ça à l\' air d\' être sur !';
                echo "\n";
                // showMap
                $map = $this->changeMap($map,$position[0], $position[1],0);
                // la nouvelle position  devient P (celle du joueur)
                $map = $this->changeMap($map,$vertical, $horizontal,'P');
                return $map;
            }
        }
        
        
        $newPossition = [$vertical,$horizontal];
        echo "Nouvelle position  vertical :";
        print_r($newPossition);
        echo "\n";        
        return $isValidMove;
    }


}