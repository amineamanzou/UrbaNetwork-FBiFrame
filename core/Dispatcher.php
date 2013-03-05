<?php
class Dispatcher {

    var $request;

    function __construct(){
        $this->request = new Request();
        Router::parse($this->request->url,$this->request);
        $controller = $this->loadController();
        //Si l'action n'est pas défini dans le tableau des méthodes du controller
        if (!in_array($this->request->action,  get_class_methods($controller))){
            $this->error('Le controller '.$this->request->controller.
                    ' n\'a pas de méthode '.$this->request->action);
        }
        else {
            // action permettant d'appeller une action 
            call_user_func_array(array($controller,$this->request->action), $this->request->params);
            $controller->render($this->request->action);
        }    
    }
    
    function error($message){
        header('HTTP/1.0 404 Not Found');
        $controller = new Controller($this->request);
        $controller->set('message',$message);
        $controller->render('/errors/404'); 
        
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
?> 