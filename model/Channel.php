<?php
class Channel extends Model{
    
    public function insertChannel($req){
        $sql = "INSERT INTO $this->table (url,score) 
                VALUES ('". mysql_real_escape_string($req['url']) ."','"
                .$req['score'].")";
        $pre = $this->db->prepare($sql);
        $pre->execute();
        return $this->db->LastInsertId();
    }
    
}
?>
