<?php
class Router {
    
    /**
     * Permet de parser une URL
     * @param $url Url à parser
     * @return tableau contenant les paramètres
     */
    static function parse($url,$request){
        // Enlève les slash au début et à la fin
        $url = trim($url,'/');
        
        $params =  explode('/', $url);
        $request->controller = $params[0];
        $request->action = isset($params[1]) ? $params[1] : 'index';
        //ignore les deux premiers params
        $request->params = array_slice($params, 2); 
        return true;
    }
}
