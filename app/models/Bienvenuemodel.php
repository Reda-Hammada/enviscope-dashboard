<?php 

class Bienvenuemodel {


    public function __construct(){

        $this->db = new Database;
    }



    public function addBienvenue($bienvenue){

        $this->db->query("INSERT INTO bienvenue (bien) VALUES(:bienvenue)");
        $this->db->bind(":bienvenue", $bienvenue);
        $this->db->execute();

    }
    public function getBienvenue(){

        $this->db->query('SELECT * FROM bienvenue');
        $result = $this->db->resultSet();
        return $result;
        
    }

    public function getBienvenueById($id){

        $this->db->query('SELECT * FROM bienvenue WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        $result = $this->db->single();

        return $result;
    }

    public function editBienvenue($id, $bien){

        $this->db->query('UPDATE bienvenue SET bien = :bien WHERE id = :id ');
        $this->db->bind(':bien', $bien);
        $this->db->bind(':id', $id);
        $this->db->execute();

    }
}







?>