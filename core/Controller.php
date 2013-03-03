<?php
class Controller {
    
    public $request;
    private $vars = array();       //contient les variable communiqué à travers la vue
    private $layout = 'default';
    
    function __construct($request) {
        $this->request = $request;
    }
    
    public function render($view){
        extract($this->vars);
        $view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
        ob_start();
        require($view);
        $content_for_layout = ob_get_clean();
        require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
    }
    
    
    /**
     * Système d'envoie de variable vers la vue
     * $value = null pour rendre l'argument facultatif 
     * 
     * @params $key Nom de la variable
     * @param  $value Valeur de la variabe au cas ou une seul variable envoyé
     */
    public function set($key,$value=null){
        // si plusieurs arguments
        if (is_array($key)){
            $this->vars += $key;
        }
        else {
            $this->vars[$key] = $value;
        }
    }
}
?>

