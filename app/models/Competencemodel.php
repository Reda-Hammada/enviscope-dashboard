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

    // get competence by id 
    public function getCompeteneById($id){

        $this->db->query('SELECT * FROM comepetences WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $result = $this->db->single();
    }
    // delete a competence 

    public function deleteCompetence($id){

        $this->db->query('DELETE FROM comepetences WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    // edit a competence

    public function updateCompetence($id, $body,$title){

        $this->db->query("UPDATE `comepetences` set title = :title, body=:body WHERE id = :id");
        $this->db->bind(':title', $title);
        $this->db->bind(':body', $body);
        $this->db->bind(':id', $id);
        $this->db->execute();

    }
}