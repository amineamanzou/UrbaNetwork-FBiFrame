<?php
class PagesController extends Controller{
    
    function WhatTheyDo(){
        $d['nompage'] = 'WhatTheyDo';
        $this->loadModel('Wid');
        
        $d['page'] = $this->Wid->findfriendwids(array(
            1112232131,
            12434352433,
            1123142131
        ));
        $d['pages'] = array_diff( // Afin d'enlever les méthode du parent
                        get_class_methods($this),
                        get_class_methods(get_parent_class($this)) 
                       );
        if(empty($d['page'])){
            $this->e404('Page introuvable');
        }
        
        $this->set($d);
    }
    
    function WhatIDo(){
        $d['nompage'] = 'WhatIDo';
        $this->loadModel('Wid');
        
        $d['page'] = $this->Wid->finduserwids(array(
            1112232131
        ));
        $d['pages'] = array_diff( // Afin d'enlever les méthode du parent
                        get_class_methods($this),
                        get_class_methods(get_parent_class($this)) 
                       );

        if(empty($d['page'])){
            $this->e404('Page introuvable');
        }
        
        $this->set($d);
    }
    
    function Channel(){
        $d['nompage'] = 'Channel';
        
        $d['pages'] = array_diff( // Afin d'enlever les méthode du parent
                        get_class_methods($this),
                        get_class_methods(get_parent_class($this)) 
                       );
        $this->set($d);
    }
    
    function Contact(){
        $d['nompage'] = 'Contact';
        
        $d['pages'] = array_diff( // Afin d'enlever les méthode du parent
                        get_class_methods($this),
                        get_class_methods(get_parent_class($this)) 
                       );
        $this->set($d);
    }
    
    function Company(){
        $d['nompage'] = 'Company';
        
        $d['pages'] = array_diff( // Afin d'enlever les méthode du parent
                        get_class_methods($this),
                        get_class_methods(get_parent_class($this)) 
                       );
        $this->set($d);
    }
}
?>
 

