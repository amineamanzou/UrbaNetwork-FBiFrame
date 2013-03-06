<?php
class PagesController extends Controller{
    
    function WhatTheyDo(){
        $this->loadModel('Wid');
        
        $d['page'] = $this->Wid->findfriendwids(array(
            1112232131,
            12434352433,
            1123142131
        ));
        $d['pages'] = get_class_methods($this);
        if(empty($d['page'])){
            $this->e404('Page introuvable');
        }
        
        $this->set($d);
    }
    
    function WhatIDo(){
        $this->loadModel('Wid');
        
        $d['page'] = $this->Wid->finduserwids(array(
            1112232131
        ));
        $d['pages'] = get_class_methods($this);

        if(empty($d['page'])){
            $this->e404('Page introuvable');
        }
        
        $this->set($d);
    }
    
    function Profile(){
        
    }
    
    function Channel(){
        
    }
    
    function Contact(){
        
    }
    
    function Company(){
        
    }
}
?>
 

