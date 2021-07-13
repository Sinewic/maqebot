<?php
/**
 * @author Saikaew W 
 * @version 1.0.0
 * -------------------------------------------------------------------
 * MAQE Bot
 * -------------------------------------------------------------------
 * Conditions:
 * MAQE Bot starts at the position (X, Y) of 0, 0
 * MAQE Bot is facing up North
 * R: Turn 90 degree to the right of MAQE Bot (clockwise)
 * L: Turn 90 degree to the left of MAQE Bot (counterclockwise)
 * WN: Walk straight for N point(s) where N can be any positive integers. 
 * For example, W1 means walking straight for 1 point.
 * 
 */


/**
 * @param $argv[1] The script accepts a command line argument as an input string of the walking code.
 */

if( isset( $argv[1] ) ){

    $commands = $argv[1]; 

    getCommand( $commands );

}else{

    echo "Please Enter string! \n";

    return;
}

/**
 * @param $command.
 * 
 */
function getCommand( $commands ){

    new MaqeBot( $commands );

}

/**
 * MaqeBot Main class
 */
class MaqeBot{

    private const DIRECTION = ['North', 'East', 'South', 'West']; 
    private static $x, $y, $direction;

    function __construct($commands){    
        $this->x = 0;
        $this->y = 0;
        $this->direction = self::DIRECTION; 

        $this->runCommand($commands);
    }

    /**
     * runCommand function
     *
     * @param string $commands  
     * 
     * @return string $result 
     */
    public function runCommand ( string $commands ) {

        $commands = self::parseCommands( $commands );  

        foreach ( $commands as $key => $command ) {
            switch ( $command ) {
                case 'R':                   
                    $this->turnRight();
                    break;

                case 'L':   
                    $this->turnLeft();                    
                    break;

                case 'W':
                    $distance = $commands[$key + 1];
                    $this->walk( $distance );                    
                    break;
            }            
        }
        
        $result = $this->result();

        return $result;
    }

    /**
     * parseCommands function
     *
     * @param string $command
     * @return array $commands
     */    
    private static function parseCommands( string $command ) : array {   

        $commands = $matches = [];
        $command =  strtoupper( $command );

        preg_match_all( '/(\d+|[R,L,W]{1}+)/', $command, $matches );

        foreach ( $matches[1] as $match ) {
           $commands[] = $match;
        }

        return $commands;

    }

    /**
     * turnRight function
     * 
     * @return void
     */  
    private function turnRight() : void {

        if(  key($this->direction) == 3 ) {
            reset($this->direction); 
        } else {            
            next($this->direction);   
        }           

    }

    /**
     * turnLeft function
     * 
     * @return void
     */  
    private function turnLeft() : void {

        if(  key($this->direction) == 0 ) {  
            end($this->direction);
        } else { 
            prev($this->direction); 
        }    

    }

    /**
     * walk function
     *
     * @param int $distance    
     * 
     * @return void 
     */  
    private function walk( int $distance ) : void {
               
        $number = intval($distance);
        $currentDirection = current($this->direction);

    	switch ($currentDirection) {
    		case self::DIRECTION[0]:    // North    Y
    			$this->y += $number;
    			break;

    		case self::DIRECTION[1]:    // East     X
    			$this->x += $number;
    			break;

    		case self::DIRECTION[2]:    // South    -Y
                $this->y -= $number;
    			break;

    		case self::DIRECTION[3]:    // West     -X    			
                $this->x -= $number;
    			break;
    	}

    }

    /**
     * result function
     * 
     * @return void
     */
    private function result() : void {        
        echo "X: ".$this->x." Y: ".$this->y." Direction: ".current($this->direction)."\n";        
    }
    
}
    

?>