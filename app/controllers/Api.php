<?php 

    class Api extends Controller {

        public function __construct(){

            $this->Apimodel = $this->model('Apimodel');

        }   



        public function bienvenue(){

            $bienvenue = $this->Apimodel->fetchBievenue();

            $data = [

                'bienvenue'=> $bienvenue,
            ];

            $this->view('api/bienvenue', $data);
        }
        
        public function projet(){

            $projects = $this->Apimodel->fetchProjet();

            $data = [

                'projects' => $projects,
            ];
            
            $this->view('api/projet', $data);
        }

        public function competence(){

           $competences = $this->Apimodel->fetchCompetence();


           $data = [

            "competences"=>$competences,
           ];

           $this->view('api/competence', $data);
        }

        public function reference(){

            $references = $this->Apimodel->fetchReference();

            $data = [

                "references"=>$references,
            ];

            $this->view('api/reference', $data);
        }
    }

?>