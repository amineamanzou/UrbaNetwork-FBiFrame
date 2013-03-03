<?php
class PagesController extends Controller{
    
    function view($nom){
        $this->set(array(
           'phrase' => 'Salut',
            'nom' => 'Mr. Visiteur'
        ));
        $this->render($nom);
    }
    
}
?>
 

