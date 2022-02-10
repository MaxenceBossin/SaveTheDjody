<?php
class Player {
    protected $items;
    protected $panneauStop;

    
    function __construct(){
        $this->items  = [];
        $this->panneauStop  = false;
    }

    public function getItems(){
        return $this->items;
    }
    public function getPanneauStop(){
        return $this->panneauStop;
    }

    public function setItems($items){
        $this->items = $items;
    }
    public function setPanneauStop($panneauStop){
        $this->panneauStop = $panneauStop;
    }
    // position du player
    public function playerPosition($map)
    {
        $position = [0,0];
        for($line = 0; $line < count($map); $line++){
            for($cell = 0; $cell < count($map[$line]); $cell++){
                if($map[$line][$cell] === 'P'){
                    $position=[$line, $cell];
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
        $isValidMove = $map;
        // On test de faire la nouvelle position on la verefie apres si c'est ok ou non
        // si ok on change la position plus la map
        // si KO on annule la position et on rappelle la fonction playerChoice pour que Djody 
        // se déplace denouveaux
        // à changer les key 4 et 5
        $vertical     = $position[0]+$move[0];
        $horizontal   = $position[1]+$move[1];
        echo "\n";
        echo"vertical : $vertical ";
        echo "\n";
        echo"horizontal : $horizontal ";
        echo "\n";
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
                // on place le paneau dans son inventaire
                $this->setPanneauStop(true);
                var_dump($this->getPanneauStop());
                // faire une méthode pour que le perso est le panneaux
                // novelle map
                
                // la nouvelle position  devient P (celle du joueur)
                $map = $this->changeMap($map,$vertical, $horizontal,'P');
                // la position actuelle devient 0
                $map = $this->changeMap($map,$position[0], $position[1],0);

                return $map;

            }elseif($map[$vertical][$horizontal] === 'E'){
                echo'C la sorti !';
                echo "\n";
                echo'Defonce la porte  !';
                echo "\n";
                
                //tester si on a le panneau
                var_dump($this->getPanneauStop());
                if($this->getPanneauStop() !== true){
                    echo "\n";
                    echo'Dimitry est là OH nononononononon !';
                    echo "\n";
                    echo "\n";
                    echo'Djody au cachot PARTIE PERDU';
                    echo "\n";
                    echo'GAME OVER';
                }else{
                    echo "\n";
                    echo'PRANKED !!!';
                    echo "\n";
                    echo'Dimitry était là depuis le debut';
                    echo "\n";
                    echo "\n";
                    echo'Mais bon il avait trop bu';
                    echo "\n";
                    echo'Grace à ton panneaux tu t en vas discrement';
                    echo "\n";
                    echo'Bien ouej : GAME OVER';
                }
                // sinon on se fait areter par dimitri
                // sinon on fait la rev
                $isValidMove = 'end';

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
        return $isValidMove;
    }


}