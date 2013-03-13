<?php
class Dispatcher {

    var $request;

    function __construct(){
        $this->request = new Request();
        Router::parse($this->request->url,$this->request);
        $controller = $this->loadController();
 
        //Si l'action n'est pas défini dans le tableau des méthodes du controller
        if (!in_array(
                $this->request->action, 
                array_diff( // Afin d'enlever les méthode du parent
                        get_class_methods($controller),
                        get_class_methods(get_parent_class($controller)) 
                        )
                ))
        {
            $this->error('Le controller '.$this->request->controller.
                    ' n\'a pas de méthode '.$this->request->action);
        }
        else {
            // action permettant d'appeller  une action 
            call_user_func_array(array($controller,$this->request->action), $this->request->params);
            $controller->render($this->request->action);
        }    
    }
    
    function error($message){
        $controller = new Controller($this->request);
        $controller->e404($message);
    }
    
    function loadController(){
        // stocker le nom
        $name = ucfirst($this->request->controller).'Controller';
        $file = ROOT.DS.'controller'.DS.$name.'.php';
        require $file;
        // $name sera remplacé par le bon controller
        $controller =  new $name($this->request);
        require ROOT.DS.'controller'.DS.'UsersController.php';
        $controller->User = new UsersController();
        return $controller;
    }


}
?> 