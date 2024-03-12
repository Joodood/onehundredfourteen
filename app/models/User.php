<?php


class User {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }


    public function login($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        //still more
        if(is_bool($row) || empty($row)) {
            return false;
        } else {
            $properties = array_values($row);
            $passy = $properties['password'];
            if($passy == $password) {
                return $row;
            } else {
                return false;
            }
        }
    }

    public function emailExists($email) {
        $this->db->query("SELECT * FROM users WHERE email =:email");
        $this->db->bind(":email", $email);
        $this->db->execute();
        $result = $this->db->rowCount();
        if($result > 0) {
            // $error = "There is already an account associated with this email.";
            return true; 
        } else {
            return false; 
        }
    }

    
    // public function emailExists($email) {
    //     $this->db->query("SELECT * FROM users WHERE email =:email");
    //     $this->db->bind(":email", $email);
    //     $this->db->execute();
    //     $result = $this->db->single();
    //     if(sizeof($result) == 0) {
    //         return false;
    //     } else {
    //         return $result;
    //     }

    //     // if(count($result) == 0) {
    //     //     // $error = "There is already an account associated with this email.";
    //     //     return false; 
    //     // } else {
    //     //     return $result; 
    //     // }
    // }

    public function InsertIntoDatabase($email, $password){
        date_default_timezone_set('America/Chicago');
        $date = date('F d, Y, h:i:s a');
        $this->db->query('INSERT INTO users (email, password,  created_at) VALUES (:email, :password, :created_at)');
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        $this->db->bind(':created_at', $date);
        $this->db->execute();
    }


}



