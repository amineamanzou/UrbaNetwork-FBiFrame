<?php
class Request{

    public $url; //url appellé par l'utilisateur
    var $controller;
    var $action;
    var $params;
    
    function __construct(){
        $this->url = $_SERVER['REQUEST_URI'];
    }
  
  
}
