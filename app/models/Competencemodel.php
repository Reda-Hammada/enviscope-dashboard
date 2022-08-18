<?php 

class Competencemodel {

        private $db;

    public function __construct(){

        $this->db = new Database;
    }


    // insert competence
    public function addCompetence($title, $body){

        $this->db->query("INSERT INTO comepetences (title,body) VALUES(:title, :body)");
        $this->db->bind(':title', $title);
        $this->db->bind(':body', $body);
        $this->db->execute();

    }


    // get all competences
    public function getAllCompetences(){

        $this->db->query("SELECT * FROM comepetences");
        $result = $this->db->resultSet();
        
        return $result;
    }
}