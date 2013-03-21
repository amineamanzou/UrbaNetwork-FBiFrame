<?php
class Controller {
    
    public $request;                // objet Request
    private $vars = array();        // contient les variable communiqué à travers la vue
    private $layout = 'default';    // Layout utilisé pour rendre la vue
    private $rendered = false;      // permet de savoir si la vue à déjà été rendus ou pas
    private $perPage = 5;           // précise le nombre de résultats par pages

    /**
     * Constructeur
     * 
     * @param $request Objet Request de notre appli
     */
    function __construct($request=null) {
        $this->Session = new Session();
        $facebook = new Facebook(array(
                                'appId'  => AppInfo::appID(),
                                'secret' => AppInfo::appSecret(),
                                'sharedSession' => true,
                                'trustForwarded' => true,
                            ));
        $this->facebook = $facebook;
        if($request){
            $this->request = $request;      //On stock une request dans l'instance
        } 
    }
    
    /**
     * Permet de rendre une vue
     * 
     * @param $view Fichier à rendre (chemin depuis le dossier view ou nom de la vue)
     */
    public function render($view){
        if ($this->rendered){
            return false;
        }
        else {
            extract($this->vars);
            if (strpos($view, '/') === 0){
                 $view = ROOT.DS.'view'.$view.'.php';
            }
            else {
                 $view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
            }
            ob_start();
            require($view);
            $content_for_layout = ob_get_clean();
            ob_end_clean();
            require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
            $this->rendered = true;
        }
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
    
    /**
     * Permet de charger un model
     * 
     * @param $name nom du model
     */
    public function loadModel($name){
        $file = ROOT.DS.'model'.DS.$name.'.php';
        require_once $file;     // Eviter qu'il charge plusieurs fois le même modèle.
        if(!isset($this->$name)){
             $this->$name = new $name();
        }
    }
    
    /**
     * Permet de gérer les erreurs de type 404 
     * 
     * @param $message message à afficher
     */
    public function e404($message){
        header('HTTP/1.0 404 Not Found');
        $array['nompage'] = '404';
        $array['pages'] = $this->topheader();
        $array['message'] = $message;
        $this->set($array);
        $this->render('/errors/404'); 
    }
    
    public function topheader(){
        $controller = new PagesController();
        return array_diff( // Afin d'enlever les méthode du parent
                        get_class_methods($controller), 
                        get_class_methods($this)  
                       );
    }
}
?>

