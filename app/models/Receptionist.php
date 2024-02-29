<?php



class Receptionist {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // public function Receptionists() {
    //     $this->db->query('SELECT *,
    //                     posts.id as postId,
    //                     users.id as userId,
    //                     posts.created_at as postCreated,
    //                     users.created_at as userCreated
    //                     FROM posts
    //                     INNER JOIN users
    //                     ON posts.user_id = users.id
    //                     ORDER BY posts.created_at DESC
    //                     ');

    //     $results = $this->db->resultSet();
    //     return $results;

    // }

    public function getReceptionistbyId($receptionist_id) {
        $this->db->query('SELECT * FROM receptionists WHERE receptionist_id =:receptionist_id');
        $this->db->bind(':receptionist_id', $receptionist_id, PDO::PARAM_INT);
        $row = $this->db->single();
        return $row;
    }

    public function query($sql) {
        return $this->db->query($sql);
        
    }

    public function bind($param, $value, $type = null) {
        if(is_null($type)) {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default: 
                    $type = PDO::PARAM_STR;
            }
        }
        return $this->stmt->bindValue($param, $value, $type);

    }






}












?>