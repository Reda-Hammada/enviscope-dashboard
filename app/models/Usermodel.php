<?php 

class Usermodel { 

    private $db;


    public function __construct(){

        $this->db = new Database;
    }



    public function Auth($username, $password){


        $this->db->query("SELECT * FROM admin WHERE user_name = :username");
         
        $this->db->bind(":username", $username);

        $result = $this->db->single();

        


    if($result){

        if($result['user_name'] == $username && $result['pass_word'] == $password){
        
            return $result;

        }

       }

       $row = $this->db->rowCount();

       if($row > 0){

        return true;

       }else{

        return false;

        
       }

    }

    public function fetchAdmin(){

        $this->db->query('SELECT pass_word from admin');
        return $result = $this->db->single();
    }

    public function changePassword($newpassword){

        $this->db->query('UPDATE admin SET `pass_word` =:password ');
        $this->db->bind(':password', $newpassword);
        $this->db->execute();

    }
 
 
}