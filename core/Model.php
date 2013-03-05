<?php
class Model{
    
    public $db = 'default';
    
    /**
     * Constructeur
     * 
     */
    public function __construct() {
        print_r(Conf::$databases);
    }
    
    public function find(){
        
    }
    
}
?>
 