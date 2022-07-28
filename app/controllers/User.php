<?php

class User extends Controller {
    
   
    public function login(){

      
        $data = [

            'username' =>'',
            'password'=> ''

        ];

        $this->view('User/login', $data);

    }


    public function reset () {


        



    }
    
}


?>