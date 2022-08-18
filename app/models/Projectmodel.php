<?php

    class Projectmodel {

        private $db;

        public function __construct(){

            $this->db = new Database;
        }

        //  insert project into database
        public function insertProject($project){

            $this->db->query('INSERT INTO projet (project) VALUES(:project)');
            $this->db->bind(':project', $project);
            $execute = $this->db->execute();
           
        
            

        }

        // get all projects from database to display them 
        public function getAllProjects(){

            $this->db->query('SELECT * FROM projet');
            $result = $this->db->resultSet();

            return  $result;
        }



        // get a single project by id to edit it 
        public function getProjectById($id){

            $this->db->query('SELECT * from  projet WHERE id = :id ');
            $this->db->bind(':id' , $id);
            $this->db->execute();

            $result =  $this->db->single();

            return $result;
        }



        // Edit project by id
        public function editProject($id, $project){

            $this->db->query('UPDATE projet SET project = :project WHERE id = :id');
            $this->db->bind(':project', $project);
            $this->db->bind(':id', $id);
            $this->db->execute();

        }

        // delete a single project by id
        public function deleteProject($id){

            $this->db->query('DELETE FROM projet WHERE id = :id');
            $this->db->bind(':id', $id);
            $this->db->execute();
        }

    }
    










?>