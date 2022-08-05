<?php


Class Admin extends Controller {


    public function __construct(){

        $this->Projectmodel = $this->model('Projectmodel');

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

        $data = [];

        $this->view('admin/projet');
        
    }

    public function  references(){

        $data = [];

        $this->view('admin/projet');
        
    }

    public function projet() {



            if(isset($_POST['add'])){

                $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


                
        $data = [


            'id' =>"",
            'year' =>$_POST['year'],
            'projet' =>$_POST['projet'],
            'projet_err'=>"",
            'year_err' => "",
        ];


        
        // validate inputs 

        if(empty($data['year']) . empty($data['projet']) ){

            $data['year_err'] = "Veuillez entrer l'année";
            $data['projet_err'] = 'Veuillez entrer le projet';



         }

        // if(empty($data['projet'])){

        //     $data['projet_err'] = 'Veuillez entrer le projet';


        // }
        if(empty($data['year_err']) && empty($data['projet_err'])){


            $this->addProject($data['projet'], $data['year']);
        

        }else {
            // load view with errors
            $this->view('admin/projet', $data);


           }

            }else{
        // load data into the view

        $data = [


            'id' =>"",
            'year' =>"",
            'projet' =>"",
            'projet_err'=>"",
            'year_err' => "",
        ];

        $this->view('admin/projet', $data);
        
    }

}
  
    

    public function addProject($project,$year){
        
        $this->Projectmodel->insertProject($project,$year);
       redirect('admin/projet');
    }


    


}



?>