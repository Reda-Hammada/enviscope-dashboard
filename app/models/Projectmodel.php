<?php

    class Projectmodel {

        private $db;

        public function __construct(){

            $this->db = new Database;
        }


        public function insertProject($project, $year){

            $this->db->query('INSERT INTO projet (project,year) VALUES(:project, :year)');
            $this->db->bind(':project', $project);
            $this->db->bind(':year', $year);
            $execute = $this->db->execute();
            if($execute){

                return true;
            }else {

                return false;
            }
        
            

        }

        public function getAllProjects(){

            $this->db->query('SELECT * FROM projet');
            $result = $this->db->resultSet();

            return  $result;
        }


    }
    










?>