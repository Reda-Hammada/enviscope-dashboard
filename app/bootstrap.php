<?php 

    //Load Config
    require_once 'config/config.php';
      // Load Helpers
    require_once 'helpers/url_helper.php';
    // Session Helper 
    require_once 'helpers/session_helper.php';

    //Load libararies 
    // Autoload Core Libraries 

    spl_autoload_register(function($className){

        require_once 'libraries/' . $className . '.php';


    });


    