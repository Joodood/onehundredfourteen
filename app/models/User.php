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

        if(is_bool($row) || empty($row)) {
            return false;
        } else {
            // Verify hashed password
            $hashedPassword = $row['password'];

            if(password_verify($password, $hashedPassword)) {
                // Password is correct, return user data as object
                return (object)$row;
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


// Get user by ID
    public function getUserById($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

// Update password
    public function updatePassword($user_id, $new_password) {
        // Hash the new password
        $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);

        $this->db->query('UPDATE users SET password = :password WHERE id = :id');
        $this->db->bind(':password', $hashedPassword, PDO::PARAM_STR);
        $this->db->bind(':id', $user_id, PDO::PARAM_INT);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

// Delete user account
    public function deleteUser($user_id) {
        // Note: Reviews will be set to NULL due to ON DELETE SET NULL constraint
        $this->db->query('DELETE FROM users WHERE id = :id');
        $this->db->bind(':id', $user_id, PDO::PARAM_INT);

        if($this->db->execute()) {
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

        // Hash the password before storing
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->db->query('INSERT INTO users (email, password, created_at) VALUES (:email, :password, :created_at)');
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $hashedPassword);
        $this->db->bind(':created_at', $date);
        $this->db->execute();
    }

}



