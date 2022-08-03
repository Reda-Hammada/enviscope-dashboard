<?php


Class Admin extends Controller {


    public function __construct(){


        if(!isloggedIn()){

            redirect('user/login');

        }
    
    }


    public function dashboard(){


        $data = [];

        $this->view('admin/dashboard', $data);
    }



    public function settings(){

        $data = [];

        $this->view('admin/settings');
    }
}


?>