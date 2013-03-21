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
    
    public function findPublicWids($req = Null){
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
    
    public function findUserWids($req){
        $sql = 'SELECT nom, prenom, verbe, place, quand FROM '.$this->table.' as '. get_class($this) .' NATURAL JOIN postes NATURAL JOIN users ';
        if (isset($req['conditions'])){
            $sql .= 'WHERE facebook_id = '.$req['conditions'].' ';
        }
        $sql .= 'ORDER BY quand DESC ';
        if (isset($req['limit'])){
            $sql .= 'LIMIT '.$req['limit'];
        }
        $pre = $this->db->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_OBJ);
    } 
    
    public function findCount($req){
        $sql = 'SELECT COUNT(wids_id) as count FROM '.$this->table.' as '. get_class($this) .' NATURAL JOIN postes NATURAL JOIN users ';
        if(isset($req['conditions'])){
            $sql .= 'WHERE facebook_id = '.$req['conditions'].' ';
        }
        $pre = $this->db->prepare($sql);
        $pre->execute();
        $res = current($pre->fetchAll(PDO::FETCH_OBJ));
        return $res->count;
    }
    
}
?>
