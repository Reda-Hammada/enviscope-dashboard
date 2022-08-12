<?php


Class Admin extends Controller {


    public function __construct(){

        // load models into the controller once the controller is called 
        $this->Projectmodel = $this->model('Projectmodel');
        $this->Bienvenuemodel = $this->model('Bienvenuemodel');
        
        // check if the admin is logged if not redirect him to the login page 
        if(!isloggedIn()){

            redirect('user/login');

        }
    
    }

 
    

    // dashboard view
    public function dashboard(){


        $data = [];

        $this->view('admin/dashboard', $data);
    }


    // setting view
    //setting starts
    public function settings(){

        $data = [];

        $this->view('admin/settings');
    }
    // setting ends


    // competence view
    // competence starts
    public function  competences(){

        $data = [];

        $this->view('admin/projet');
        
    }
    // competence ends

    // reference starts
    // reference view
    public function  references(){

        $data = [];

        $this->view('admin/projet');
        
    }
    //reference ends 




    // Project starts 
    //project view
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

    public function editProjet($id){

        if(isset($_POST['edit'])):

            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

             // display projects data from project model
             $displayProject = $this->Projectmodel->getAllProjects();

            $data = [
                'id'=>$id,
                'projet'=>$_POST['project'],
                'project_added' => $displayProject,

                     ];


           
            // load the editted project from the controller to the model to update the project 

            $this->Projectmodel->editProject($data['id'], $data['projet']);

            // redirect to project page 
            redirect('admin/projet');
            
        else:       
            // display projects data from project model
            $displayProject = $this->Projectmodel->getAllProjects();

            // Get project by id to load it into the view
            $getProjectById = $this->Projectmodel->getProjectById($id);

            // load data (the selected project to edit) to the view 
            $data = [

                

                'id' =>"",
                'projet' =>"",
                'projet_err'=>"",
                'project_added' => $displayProject,
                'editProject' =>$getProjectById['project']

            ];

            $this->view('admin/editProjet', $data);

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

            
        if(isset($_POST['add'])):

            $bienvenue = $this->Bienvenuemodel->getBienvenue();
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
        
            $data = [


                'id' =>"",
                'bienvenue' =>trim($_POST['bienvenue']),
                'bienvenue_err'=>"",
                'bienvenue_added' => $bienvenue,

            
            ];

            if(empty($data['bienvenue'])):

                $data['bienvenue_err'] =  "Veuillez entrer bienvenue";


                // loads view with errors
                $this->view('admin/bienvenue', $data);
            endif;
            
            if(empty($data['bienvenue_err'])):

                 $this->Bienvenuemodel->addBienvenue($data['bienvenue']);
                


            endif;
      

        
        
    
    
    else:  

        $bienvenue = $this->Bienvenuemodel->getBienvenue();

        $data = [
            'id'=>"",
            'bienvenue'=>"",
            'bienvenue_err'=>"",
            'bienvenue_added' => $bienvenue,

        ];

        $this->view('admin/bienvenue', $data);

    endif;


    }

    // edit bienvenue
    public function editBienvenue($id){



            if(isset($_POST['editBien'])):

                $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $edittedBienvenue =  $this->Bienvenuemodel->getBienvenueById($id);
                $bienvenue = $this->Bienvenuemodel->getBienvenue();

                

                $data = [

                    'id'=>"",
                    'bienvenue'=>"",
                    'bienvenue_err'=>"",
                    'bienvenue_edit'=>trim($_POST['bien']),
                    'bienvenue_added' => $bienvenue,
                    'edit_bienvenue'=>$edittedBienvenue['bien'],
        
                ];
                


                $this->Bienvenuemodel->editBienvenue($id, $data['bienvenue_edit']);
                redirect('admin/bienvenue');


            else:

                $bienvenue = $this->Bienvenuemodel->getBienvenue();
                $edittedBienvenue =  $this->Bienvenuemodel->getBienvenueById($id);

                $data = [

                    'id'=>"",
                    'bienvenue'=>"",
                    'bienvenue_err'=>"",
                    'bienvenue_edit'=>"",
                    'edit_bienvenue'=>$edittedBienvenue['bien'],
                    'bienvenue_added' => $bienvenue,
        
                ];

                $this->view('admin/editBienvenue', $data);
                

            endif;
    }

    //Bienvenue ends 




}

 ?>