<?php 


    Class Apimodel {

        private $db;


        public function __construct(){

            $this->db = new Database; 
        }

        public function fetchCompetence(){

            $this->db->query('SELECT * FROM comepetences');
            $result = $this->db->resultSet();
            
            return $result;
        }

        public function fetchReference(){

            $this->db->query('SELECT * FROM `references`');
            $result = $this->db->resultSet();
            
            return $result;
        }


        public function fetchProjet(){

            $this->db->query('SELECT * FROM projet');
            $result = $this->db->resultSet();
            
            return $result;
        }


        public function fetchBievenue(){

            $this->db->query('SELECT * FROM bienvenue');

            $result = $this->db->single();
            
            return $result;
        }
        

    }

    ?>