
<?php 


class Usermodel { 

    private $db;


    public function __construct(){

        $this->db = new Database;
    }



    public function checkCredentials($username, $password){


        $this->db->query("SELECT * FROM admin WHERE user_name = :username");
         
        $this->db->bind(":username", $username);

        $result = $this->db->single();

        if($result->user_name == $username && $result->pass_word == $password){

            return false;
        }

        else {

            return true;
        }

    }
 
}