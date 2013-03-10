<?php
class User extends Model{
    
    public function matchUser($req){
        $sql = 'SELECT users_id,nom,prenom,discipline FROM '.$this->table.' ';
        if (isset($req['conditions'])){
            $sql .= 'WHERE '.$req['conditions'];
        }
        $pre = $this->db->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_OBJ);   
    }
    
    public function insertUser($req){
        $sql = "INSERT INTO $this->table (nom,prenom,facebook_id) 
                VALUES ('". mysql_real_escape_string($req['nom']) ."','"
                .  mysql_real_escape_string($req['prenom'])
                ."',".$req['uid'].")";
        $pre = $this->db->prepare($sql);
        $pre->execute();
        return $this->db->LastInsertId();
        
    }
    
}
?>
