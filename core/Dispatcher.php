<?php
class Dispatcher {

    var $request;

    function __construct(){
        $this->request = new Request();
        Router::parse($this->request->url,$this->request);
        $controller = $this->loadController();
        // action permettant d'appeller une action 
        call_user_func_array(array($controller,$this->request->action), $this->request->params);
    }
    
    function loadController(){
        // stocker le nom
        $name = ucfirst($this->request->controller).'Controller';
        $file = ROOT.DS.'controller'.DS.$name.'.php';
        require $file;
        // $name sera remplacé par le bon controller
        return new $name($this->request);
        
    }

}

 