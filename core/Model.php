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
        
        // J'initialise quelques variables
        if ($this->table === false){
            $this->table = strtolower(get_class($this)).'s';
        }
        
        
    }
    
    public function find($req){
        $sql = 'SELECT * FROM '.$this->table.' as '. get_class($this) .' ';
        if (isset($req['conditions'])){
            $sql .= 'WHERE '.$req['conditions'];
        }
        die($sql);
        $pre = $this->db->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_OBJ);
       
    }
    
    public function findfriendwids($req){
        $sql = 'SELECT nom, prenom, verbe, place, quand FROM '.$this->table.' as '. get_class($this) .' NATURAL JOIN postes NATURAL JOIN users ';
        if (isset($req[0])){
            $sql .= 'WHERE facebook_id = '.$req[0].' ';
        }
        $i = 1;
        while (isset($req[$i])){
            $sql .= 'OR facebook_id = '.$req[$i].' ';
            $i++;
        }
        $sql .= 'ORDER BY quand DESC LIMIT 10;';
        $pre = $this->db->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function finduserwids($req){
        $sql = 'SELECT nom, prenom, verbe, place, quand FROM '.$this->table.' as '. get_class($this) .' NATURAL JOIN postes NATURAL JOIN users ';
        if (isset($req[0])){
            $sql .= 'WHERE facebook_id = '.$req[0].' ';
        }
        $sql .= 'ORDER BY quand DESC LIMIT 10;';
        $pre = $this->db->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_OBJ);
    }
}
?>
 