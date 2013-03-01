<?php
    define('WEBROOT',dirname(__FILE__));
    define('DS',DIRECTORY_SEPARATOR);
    define('ROOT',dirname(WEBROOT));
    define('CORE',ROOT.DS.'core');
    define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));
    
    require CORE.DS.'includes.php';

    new Dispatcher();
?>
