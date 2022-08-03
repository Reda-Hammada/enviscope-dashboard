<?php


 // redirect to login page if not authenticated
 function  isloggedIn(){

    session_start();
    
    if(isset($_SESSION['id'])):

      return true; 

    else:

      return false;

    endif;
  }




?>