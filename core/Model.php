<?php
class Model{
    
    static $connections = array();
    public $conf = 'dev';
    public $table = false;
    public $db;
    
    /**
     * Constructeur
     * 
     */
    public function __construct() {
        
        // J'initialise quelques variables
        if ($this->table === false){
            $this->table = strtolower(get_class($this)).'s';
        }
        
        // Je me connecte à la base
        $conf = Conf::$databases[$this->conf];
        if (isset(Model::$connections[$this->conf])){
            $this->db = Model::$connections[$this->conf];
            return true;       // Il y a déjà une connection on s'arrête
        }
        else {
            try {
                $pdo = new PDO(
                            'pgsql:host='.$conf['host'].';port='.$conf['port'].';dbname='.$conf['dbname'].';',
                            $conf['login'],
                            $conf['password'] 
                          );
                $pdo->setAttribute( PDO::ATTR_ERRMODE , PDO::ERRMODE_WARNING);
                Model::$connections[$this->conf] = $pdo;
                $this->db = $pdo;
            } catch (PDOException  $e) {
                if(Conf::$debug >= 1){
                    die($e->getMessage());
                }
                else {
                    die('Impossible de se connecter à la base de donnée');
                }
            }
        }
        
    }
    

}
?>
 