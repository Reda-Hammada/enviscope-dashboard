<?php


Class Admin extends Controller {


    public function __construct(){

        // load models into the controller once the controller is called 
        $this->Competencemodel = $this->model('Competencemodel');
        $this->Referencemodel =  $this->model('Referencemodel');
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
    public function competences(){

    


        if(isset($_POST['add'])):

                 // // load all competences into the view 
                //  $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $displayCompetences = $this->Competencemodel->getAllCompetences();

            $data = [

                'title'=>trim($_POST['title']),
                'body'=>trim($_POST['body']),
                'body_err'=>"",
                'title_err'=>"",
                'competence_added'=>$displayCompetences,


            ];





            if(empty($data['title'])):

                $data['title_err'] = 'veuillez entrer le titre';
                
            endif;

            if(empty($data['body'])):

                $data['body_err'] = "veuillez entrer le paragraphe";

            endif;

            if(empty($data['title_err']) && empty($data['body_err'])):

                $this->Competencemodel->addCompetence($data['title'], $data['body']);
                redirect('admin/competences');



            else:

            
                // load errors into the view
                $this->view('admin/competences', $data);


            endif;


        


        else:

            // // load all competences into the view 
            $displayCompetences = $this->Competencemodel->getAllCompetences();

            $data = [

                'title'=>"",
                'body'=>"",
                'body_err'=>"",
                'title_err'=>"",
                'competence_added'=>$displayCompetences,

            ];

            $this->view('admin/competences', $data);

        endif;
        
    }
    // competence ends

 




    // Project starts 
    //project view
    public function projet() {

        

            if(isset($_POST['add'])):


                $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                
                // loads added projects from database
                $displayProject = $this->Projectmodel->getAllProjects();
        

     
                $data = [


                    'id' =>"",
                    'projet' =>trim($_POST['projet']),
                    'projet_err'=>'',
                    'project_added' => $displayProject,

                
                ];


                     // validate inputs 

                     if(empty($data['projet'])):

                        $data['projet_err'] = "Veuillez entrer le projet";


                    endif;


                       //check if errors empty to insert the project into database 
        
                   if(empty($data['projet_err'])):


                    $this->Projectmodel->insertProject($data['projet']); 
                    redirect('admin/projet');


                   else:                        
                        // Load view with errors
                        $this->view('admin/projet', $data);



                   endif;

               
             

            else:
        // load data into the view
        $displayProject = $this->Projectmodel->getAllProjects();

        $data = [


            'id' =>"",
            'projet' =>"",
            'projet_err'=>"",
            'project_added' => $displayProject,

        ];

        $this->view('admin/projet', $data);

        endif;
    

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
                            redirect('admin/bienvenue');
                            
                    


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


       // reference starts
    // reference view
    public function  references(){


        
        if(isset($_POST['add'])):
            
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $displayReferences = $this->Referencemodel->getAllReferences();

            $data = [
                'reference'=>trim($_POST['reference']),
                'year'=>trim($_POST['year']),
                'reference_err'=>"",
                'year_err'=>"",
                'reference_added'=>$displayReferences

            ];


            if(empty($data['reference'])):

                $data['reference_err'] = "Veuillez entrer référence";

            endif;

            if(empty($data['year'])):

                    $data['year_err']  = "Veuillez entrer l'année"; 
            endif;

    
            if(empty($data['reference_err']) && empty($data['year_err'])):

                
                $this->Referencemodel->addReference($data['reference'], $data['year']);
                redirect('admin/references');
            else:

                //load view with errors
                $this->view('admin/references', $data);
        
            endif;

        else:
        
            $displayReferences = $this->Referencemodel->getAllReferences();
            $data = [
                'reference'=>"",
                'year'=>"",
                'reference_err'=>"",
                'year_err'=>"",
                'reference_added'=>$displayReferences
            ];

            $this->view('admin/references', $data);
    
        endif;
        
    }

    // edit a reference 

    public function editReference($id){

    if(isset($_POST['editReference'])):


        $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // load all references into the view
        $displayReferences = $this->Referencemodel->getAllReferences();

        // load single reference to be editted in the view
        $reference = $this->Referencemodel->getAReferenceById($id);

        $data = [

            'reference'=>"",
            'year'=>"",
            'reference_err'=>"",
            'year_err'=>"",
            'edit_reference'=>$reference['reference'],
            'edit_year'=>$reference['year'],
            'reference_edit'=>trim($_POST['reference']),
            'year_edit'=>trim($_POST['year']),
            'reference_added'=>$displayReferences


        ];

        $this->Referencemodel->editReference($id, $data['reference_edit'], $data['year_edit']);
        redirect('admin/references');

    


    

    else:


        // load all references into the view
        $displayReferences = $this->Referencemodel->getAllReferences();

        // load single reference to be editted in the view
        $reference = $this->Referencemodel->getAReferenceById($id);

        $data = [

            'reference'=>"",
            'year'=>"",
            'reference_err'=>"",
            'year_err'=>"",
            'edit_reference'=>$reference['reference'],
            'edit_year'=>$reference['year'],
            'reference_edit'=>"",
            'year_edit'=>"",
            'reference_added'=>$displayReferences


        ];

        $this->view('admin/editReference', $data);


    endif;

    }




    //delete a reference 

    public function deleteById($id){

        $this->Referencemodel->DeleteReference($id);
        redirect('admin/references');
    }
    //reference ends 




}

 ?>