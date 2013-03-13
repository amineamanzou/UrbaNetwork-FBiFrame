<?php
    require 'Session.php' ;
    /**
     * Provides access to app specific values such as your app id and app secret.
     * Defined in 'AppInfo.php'.
     */
    require_once ROOT.DS.'AppInfo.php';
    
    /**
     * This provides access to helper functions defined in 'utils.php'.
     */
    require_once 'utils.php';
    
    /**
     * This contains all the facebook php sdk that we will use to match
     * social data with the canvas.
     */
    require_once ROOT.DS.'sdk'.DS.'src'.DS.'facebook.php';
    
    /**
     * This contains all the function that help us to debug the application
     */
    require 'function.php';
    
    /**
     * Provides access to database specific values to connect with PDO
     */
    require ROOT.DS.'config'.DS.'conf.php';

    require 'Request.php';
    require 'Router.php';
    require 'Controller.php';
    require 'Model.php';
    require 'Dispatcher.php';
    
    
?>