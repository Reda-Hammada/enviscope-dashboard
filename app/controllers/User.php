<?php

class User extends Controller {
    

    public function __construct(){

    }
   
    public function login(){

     
        //Check for GET
        if(isset($_GET['login'])){


    
            // Process form     
            // sanatize data
            $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

            //Init Data
               $data = [

                'username' =>$_GET['username'],
                'username_err'=>'',
                'password'=> $_GET['password'],
                'password_err' =>''
    
            ];

            

            //Validate Email 

            if(empty($data['username'])):
                $data['username_err'] = 'Veuillez entrer le nom d’utilisateur';

            endif;


            //Validate password 

            if(empty($data['password'])):

                $data['password_err'] = " Veuillez entrer le mot de pass";

            endif;


            if(empty($data['username_err']) && empty($data['password_err'])){

            }
            else {

                $this->view('user/login', $data);
            }


            
        }else{

        //Init Data
            $data = [

                'username' =>'',
                'username_err'=>'',
                'password'=> '',
                'password_err' =>''
    
            ];
             
        // Load view
        $this->view('User/login', $data);

        }

     


    }


    public function reset () {


        



    }

    public function forget(){



        $this->view('user/forget');
    }
    
}


?>