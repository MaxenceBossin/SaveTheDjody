<?php
class Game {
    protected $map;
    protected $playerPos;
    protected $player;

    function __construct($player){
        $this->map = [];
        $this->player = $player;
    }
    // getteurs
    public function getMap(){
        return $this->map;
    }
    public function getPlayerPos(){
        return $this->playerPos;
    }
    public function getPlayer(){
        return $this->player;
    }
     // setteurs
    public function setMap($map){
        $this->map = $map;
    }

    public function setPlayerPos($playerPos){
        $this->playerPos = $playerPos;
    }
    // methods
    // inialise la map
    public function init(){
        $map = [
                [0  , 0, 0 , 'P' ,'K'],
                [0  , 1, 1 , 0, 1 ],
                [0, 1, 0 ,0 , 0 ],
                [0  ,0 ,0 , 0,'E'],
        ];
        $this->setMap($map);
        $this->setPlayerPos($this->getMap());
        
    }
    // montre la carte 
    public function showMap()
    {
        for($line = 0; $line < count($this->getMap()); $line++){
            for($cell = 0; $cell < count($this->getMap()[$line]); $cell++){
                echo $this->getMap()[$line][$cell].' ';
            }
            echo "\n";
        }
    }
    // launch
    public function launch()
    {
        echo'Bonjour Djody ! ';
        echo "\n";
        echo'Malheuresement l\'infame agent Dimitry a réussi a t\'atttraper ';
        echo "\n";
        echo'Grace a sa cèlèbre 8.6 ';
        echo "\n";
        echo'Pour t`\échaper il faut que tu recupère ton panneau stop ';
        echo "\n";
        echo'Il va t\'aider à ouvrir délicatement la porte ! ';
        echo "\n";
        echo'Bonne chance ! ';
        echo "\n";
    }
    private function moveRule()
    {
        echo "\n z en haut ";
        echo "\n q en gauche ";
        echo "\n s en bas ";
        echo "\n s en droite ";
        echo "\n a pour attendre ";
    }

    public function playerChoice ()
    {   
        $i=0;       
        $move = false;
        $moveAction = [];
        while($move === false){
            $move = true;
            echo "\n Ton action : ";
            $action = rtrim(fgets(STDIN));            
            if($i === 0){
                $i++;
                echo'Djody Bouge ! Appuie sur \'h\' pour un rappel des touches !';
                echo "\n Ton action : ";
            }elseif($action === 'h'){
                echo "\n Rappel des touches : ";
                $this->moveRule();
            }else{
                echo "\n tu as appuié sur '$action' t es con ou t es con";
                echo "\n on a pas le temps appuie sur la bonne touche rappel : ";
                echo $this->moveRule();

            } 
            if($action == 'z'){
                echo 'OK en haut';  
                $moveAction = [-1,0];
                $move = true;
            }elseif($action == 'q'){
                $move = true;
                echo 'GO à gauche';
                $moveAction = [0,-1];
            }elseif($action == 's'){
                $move = true;
                echo'On va en bas ??? OK..';
                $moveAction = [1,0];
            }elseif($action == 'd'){
                echo 'On va en à droite ??? dakodac balkanos';
                $moveAction = [0,1];
            }elseif($action == 'a'){
                echo 'Faudrait mieux attendre';                
                $moveAction = [0,0];   
                $move = true;    
            }else{
                $move = false;
            }            
        }    
    return $moveAction;    
        

    }
}
