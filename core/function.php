<?php

/**
 * Fonction facilitant l'affichage des variables dans une page
 * @param $var variable à afficher
 */
function debug($var){
    if (Conf::$debug > 0){
        $debug = debug_backtrace();
        echo '<p>'
                .'&nbsp;'
              .'</p>'
              .'<p>'
                .'<a href="#" onclick="$(this).parent().next(\'ol\').slideToggle(); return false;">'
                    .'<strong>'.$debug[0]['file'].' </strong>'
                .'</a>'
                .' ligne : '.$debug[0]['line']
              .'</p>';

        echo '<ol style="display:none">'; 
        foreach ($debug as $k => $v) {
            if ($k>0){
                echo '<li><strong>'.$v['file']
                    .' </strong> ligne : '.$v['line'].'</li>';
            }
        }
        echo '</ol>';
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }
}

?>