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


    public function  competences(){

        $data = [];

        $this->view('admin/projet');
        
    }

    public function  references(){

        $data = [];

        $this->view('admin/projet');
        
    }




    // Project starts 
    public function projet() {

        // loads added projects from database
        $displayProject = $this->Projectmodel->getAllProjects();

            if(isset($_POST['add'])){

                $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
     
                $data = [


                    'id' =>"",
                    'projet' =>$_POST['projet'],
                    'projet_err'=>"",
                    'project_added' => $displayProject,

                
                ];


        
        // validate inputs 

        if(empty($data['projet']) ){

            $data['projet_err'] = 'Veuillez entrer le projet';



         }


         //check if errors empty to insert the project into database 
   
        if(empty($data['projet_err'])){


            $this->addProject($data['projet']);


            

            
  
        

        }else {
            // load view with errors
            $this->view('admin/projet', $data);


           }

            }else{

        // load data into the view
        $displayProject = $this->Projectmodel->getAllProjects();

        $data = [


            'id' =>"",
            'projet' =>"",
            'projet_err'=>"",
            'project_added' => $displayProject,

        ];

       


        $this->view('admin/projet', $data);

        
    }

}
  
    //  insert project 


    public function addProject($project){
        
        $this->Projectmodel->insertProject($project); 
        redirect('admin/projet');
       

    }


    // edit a project 

    public function editProject($id){

        if(isset($_POST['edit'])):















        else:       
            // display projects data from project model
            $displayProject = $this->Projectmodel->getAllProjects();

            $getProjectById = $this->Projectmodel->getProjectById($id);


    
            $data = [

                

                'id' =>"",
                'projet' =>"",
                'projet_err'=>"",
                'project_added' => $displayProject,
                'editProject' =>$getProjectById['project']

            ];

            $this->view('admin/projet', $data);
        endif;

    }

    // Delete a project 
    public function deleteProject($id){
        $this->Projectmodel->deleteProject($id);
        redirect('admin/projet');

    }
       
    // Project ends  

    // Bienvenue starts 

    public function bienvenue(){

        $data = [];
        $this->view('admin/bienvenue', $data);
        
    }

    //Bienvenue ends 




}

 ?>