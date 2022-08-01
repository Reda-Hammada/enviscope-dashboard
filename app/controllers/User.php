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

                'username' =>trim($_GET['username']),
                'username_err'=>'',
                'password'=>trim($_GET['password']),
                'password_err' =>''
    
            ];

            

            //Validate Email 

            if(empty($data['username'])){
                $data['username_err'] = 'Veuillez entrer le nom d’utilisateur';
                


            }
            
        
            //Validate password 

            if(empty($data['password'])):

                $data['password_err'] = " Veuillez entrer le mot de pass";

            endif;


            if(empty($data['username_err']) && empty($data['password_err'])){


                $loggedUser = $this->Usermodel->Auth($data['username'], $data['password']);
               if($loggedUser !=  false){

                // pass the loggedUser to session method as an argument with callabck function 
                $classname = 'User';
                call_user_func(array($classname, 'session'),  $loggedUser);
                
               }else {

                $data['username_err'] = "Le mot d'utilisatuer est erroné";
                $data['password_err'] = "Le mot de passe est erroné";

                $this->view('user/login', $data);
               }



               
               
             
            }
            else {

               
                 
            // Load view with errors
            $this->view('User/login', $data);
    
            }


            
        }else{
            session_start();
            if(!isset($_SESSION['id']) AND !isset($_SESSION['username'])):

                 //Init Data
            $data = [

                'username' =>'',
                'username_err'=>'',
                'password'=> '',
                'password_err' =>''
    
            ];
             
        // Load view for first time
            $this->view('User/login', $data);
            
            else:


            $this->view('user/dashboard');

            endif;

        }


        
     


    }


    public function session($user){

        if($user != false):

            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['user_name'];
            redirect('User/dashboard');

        else:

            redirect('user/login');
        endif;

       
        

    }



    public function dashboard(){
        session_start();
        if(isset($_SESSION['id'])):

            $this->view('user/dashboard');

        else:

            redirect('user/login');


        endif;
       
    }



public function logout(){

    unset($_SESSION['id']);
    unset($_SESSION['username']);
    session_start();
    session_unset();
    session_destroy();

    if(!isset($_SESSION['id'])&&!isset($_SESSION['username'])){

        redirect('user/login');
    }


}

}


?>