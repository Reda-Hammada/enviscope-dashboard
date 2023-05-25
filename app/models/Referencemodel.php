<?php 

Class Referencemodel {

    private $db;

    public function __construct (){

        $this->db = new Database;
    }

    // method to insert reference to the database
    public function addReference($reference, $year){

        $this->db->query("INSERT INTO `reference` (reference,year) VALUES(:reference, :year)");
        $this->db->bind(':reference', $reference);
        $this->db->bind(':year', $year);
        $this->db->execute();
    }

    //method to fetch all references from the database
    public function getAllReferences(){

        $this->db->query('SELECT * FROM `reference`');
        $result = $this->db->resultSet();
        return $result;
    }
    
    //Get a reference by id 
    public function getAReferenceById($id){

        $this->db->query('SELECT * FROM `reference` WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $result = $this->db->single();
    }

    //edit a reference 
    public function editReference($id, $reference, $year){

        $this->db->query('UPDATE `reference` SET reference = :reference, year =:year  WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':reference', $reference);
        $this->db->bind(':year', $year);
        $this->db->execute();
        
        
    }

    // delete a reference 
    public function DeleteReference($id){

        $this->db->query(' DELETE FROM `reference` WHERE id = :id ');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
}