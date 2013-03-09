<?php
class PagesController extends Controller{
    
    function Welcome (){

        /**
         * This sample app is provided to kickstart your experience using Facebook's
         * resources for developers.  This sample app provides examples of several
         * key concepts, including authentication, the Graph API, and FQL (Facebook
         * Query Language). Please visit the docs at 'developers.facebook.com/docs'
         * to learn more about the resources available to you
         */


        // Enforce https on production
        if (substr(AppInfo::getUrl(), 0, 8) != 'https://' && $_SERVER['REMOTE_ADDR'] != '127.0.0.1') {
          header('Location: https://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
          exit();
        }



        $facebook = new Facebook(array(
          'appId'  => AppInfo::appID(),
          'secret' => AppInfo::appSecret(),
          'sharedSession' => true,
          'trustForwarded' => true,
        ));

	$user = $facebook->getUser();

        if ($user) {
          echo '<a href="' . $facebook->getLogoutUrl() . '">Logout</a>';
        } else {
          echo '<a href="' . $facebook->getLoginUrl() . '">Login</a>';
        }
        
        
        

        if ($user) {
          try {
            // Fetch the viewer's basic information
            $basic = $facebook->api('/me');
            $d['basic'] = $basic;
          } catch (FacebookApiException $e) {
            // If the call fails we check if we still have a user. The user will be
            // cleared if the error is because of an invalid accesstoken
            if (!$facebook->getUser()) {
              header('Location: '. AppInfo::getUrl($_SERVER['REQUEST_URI']));
              exit();
            }
          }

          // This fetches some things that you like . 'limit=*" only returns * values.
          // To see the format of the data you are retrieving, use the "Graph API
          // Explorer" which is at https://developers.facebook.com/tools/explorer/
          $likes = idx($facebook->api('/me/likes?limit=4'), 'data', array());

          // This fetches 4 of your friends.
          $friends = idx($facebook->api('/me/friends?limit=4'), 'data', array());

          // And this returns 16 of your photos.
          $photos = idx($facebook->api('/me/photos?limit=16'), 'data', array());

          // Here is an example of a FQL call that fetches all of your friends that are
          // using this app
          $app_using_friends = $facebook->api(array(
            'method' => 'fql.query',
            'query' => 'SELECT uid, name FROM user WHERE uid IN(SELECT uid2 FROM friend WHERE uid1 = me()) AND is_app_user = 1'
          ));
            $d['likes'] = $likes;
            $d['friends'] = $friends;
            $d['photos'] = $photos;
        }

        // Fetch the basic info of the app that they are using
        $app_info = $facebook->api('/'. AppInfo::appID());

        $app_name = idx($app_info, 'name', '');
        

        $d['app_info'] = $app_info ;
        $d['app_name'] = $app_name;
        
        $d['nompage'] = 'Welcome';
        
        $d['pages'] = array_diff( // Afin d'enlever les méthode du parent
                        get_class_methods($this),
                        get_class_methods(get_parent_class($this)) 
                       );
//        debug($d);
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
 

