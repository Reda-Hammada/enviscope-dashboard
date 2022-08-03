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

    public function bienvenue(){

        $data = [];
        $this->view('admin/bienvenue', $data);
        
    }

    public function  competences(){

        
        $this->view('admin/projet');
        
    }

    public function  references(){

        
        $this->view('admin/projet');
        
    }

    public function projet() {


        $this->view('admin/projet');
        
    }
}



?>