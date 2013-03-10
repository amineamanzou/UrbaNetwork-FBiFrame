<?php
class Wid extends Model{
    
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
