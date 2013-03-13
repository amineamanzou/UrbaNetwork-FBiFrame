<?php
class PagesController extends Controller{
    
    function Welcome (){
        $d['nompage'] = 'Welcome';
        
        // Enforce https on production
        /*if (substr(AppInfo::getUrl(), 0, 8) != 'https://' && $_SERVER['REMOTE_ADDR'] != '127.0.0.1') {
            header('Location: https://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
            exit();
        }*/
        
        $connected = $this->User->login();
        
        
        if ($connected === TRUE) {
            $this->Session->setFlash('You are connected','success');
        } else {
            $this->Session->setFlash('You are not connected','danger');
        }
        
        // Fetch the basic info of the app that they are using
        /*$app_info = $facebook->api('/'. AppInfo::appID());

        $app_name = idx($app_info, 'name', '');

        $d['app_info'] = $app_info ;
        $d['app_name'] = $app_name;
*/
        $d['connected']=$connected;
        $d['pages'] = array_diff( // Afin d'enlever les méthode du parent
                        get_class_methods($this),
                        get_class_methods(get_parent_class($this)) 
                       );
        $this->set($d);
    }
    
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
    
    function Channel($channelName = NULL){
        $userChannel='olegoalo';
        $d['nompage'] = 'Channel';
        require_once 'Zend/Loader.php';
        Zend_Loader::loadClass('Zend_Gdata_YouTube');
        $yt = new Zend_Gdata_YouTube();
        if(isset($channelName)){
            $videoFeed = $yt->getVideoFeed('http://gdata.youtube.com/feeds/users/'.$channelName.'/uploads');
        }
        else {
            $videoFeed = $yt->getVideoFeed('http://gdata.youtube.com/feeds/users/'.$userChannel.'/uploads');
        }
        $d['videoFeed'] = $videoFeed;
        
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
 

