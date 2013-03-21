<?php
class Request{

    public $url;            //url appellé par l'utilisateur
    public $numPage = 1;
    var $controller;
    var $action;
    var $params;
    
    function __construct(){
        $this->url = $_SERVER['REQUEST_URI'];
        if(isset($_GET['numPage'])){
            if(is_numeric($_GET['numPage']))
            $this->numPage = round($_GET['numPage']);
        }
    }
  
  
}
