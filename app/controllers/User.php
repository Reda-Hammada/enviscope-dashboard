<?php

class User extends Controller {
    

    public function __construct(){

        $this->Usermodel = $this->model('Usermodel');

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

            if(empty($data['username'])){
                $data['username_err'] = 'Veuillez entrer le nom d’utilisateur';
                


            }
            
            else{
                
                if($this->Usermodel->checkCredentials($data['username'], $data['password'])){

                    $data['username_err'] =  "mot d'utilisateur est erroné";
                    $data['password_err'] =  "mot de passe est erroné";

                }
            }

             


            //Validate password 

            if(empty($data['password'])):

                $data['password_err'] = " Veuillez entrer le mot de pass";

            endif;


            if(empty($data['username_err']) && empty($data['password_err'])){


                $this->startSession($data['username']);


               
               
             
            }
            else {

                header('location:login');
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


    public function startSession ($username) {

        if($username){
        session_start();
        $_SESSION['user'] = $username;  
        $this->dasboard();
       

        }

        else {

            header('login');
        }
    }

    public function dasboard(){


        $this->view('user/dashboard', $_SESSION['user']);
    }
    
    public function logout(){

        session_start();
        unset($_SESSION['user']);
        session_unset();
        session_destroy();


         header('location:login');
    }
}


?>