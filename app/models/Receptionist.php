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

//    public function getReceptionistbyId($receptionist_id) {
//        $this->db->query('SELECT * FROM receptionists WHERE receptionist_id =:receptionist_id');
//        $this->db->bind(':receptionist_id', $receptionist_id, PDO::PARAM_INT);
//        $row = $this->db->single();
//        return $row;
//    }
    public function getReceptionistbyId($receptionist_id) {
        $this->db->query('SELECT r.*, i.institution_name, i.institution_city, i.institution_state, i.institution_id
                     FROM receptionists r 
                     LEFT JOIN institutions i ON r.institution_id = i.institution_id 
                     WHERE r.receptionist_id = :receptionist_id');
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


    public function if_receptionist_id_is_in_record_of_reception_reviews($receptionist_id) {
        $this->db->query('SELECT * FROM receptionists_reviews WHERE receptionist_id =:receptionist_id');
        $this->db->bind(':receptionist_id', $receptionist_id, PDO::PARAM_INT);
        $row = $this->db->resultSet();
        return $row;
    }
    
    // Get receptionist by name
    public function getReceptionistbyName($receptionist_name) {
        $this->db->query('SELECT * FROM receptionists WHERE receptionist_name =:receptionist_name');
        $this->db->bind(':receptionist_name', $receptionist_name, PDO::PARAM_STR);
        $row = $this->db->resultSet();
        return $row;
    }
    
    // Add new receptionist
    public function addReceptionist($name, $institution_id) {
        $this->db->query('INSERT INTO receptionists (receptionist_name, institution_id) 
                         VALUES (:name, :institution_id)');
        $this->db->bind(':name', $name, PDO::PARAM_STR);
        $this->db->bind(':institution_id', $institution_id, PDO::PARAM_INT);
        
        if($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }
    
    // Get all receptionists at an institution
    public function getReceptionistsByInstitution($institution_id) {
        $this->db->query('SELECT * FROM receptionists WHERE institution_id =:institution_id ORDER BY receptionist_name ASC');
        $this->db->bind(':institution_id', $institution_id, PDO::PARAM_INT);
        return $this->db->resultSet();
    }

// Search for similar receptionist names
    public function searchSimilarReceptionists($search_term, $limit = 5) {
        $first_letter = substr($search_term, 0, 1);

        $this->db->query('SELECT r.*, i.institution_name, i.institution_city, i.institution_state 
                     FROM receptionists r 
                     LEFT JOIN institutions i ON r.institution_id = i.institution_id
                     WHERE r.receptionist_name LIKE :search_term 
                     OR r.receptionist_name LIKE :first_letter
                     ORDER BY 
                        CASE 
                            WHEN r.receptionist_name LIKE :exact THEN 1
                            WHEN r.receptionist_name LIKE :starts_with THEN 2
                            ELSE 3
                        END,
                        r.receptionist_name ASC
                     LIMIT :limit');

        $this->db->bind(':search_term', '%' . $search_term . '%', PDO::PARAM_STR);
        $this->db->bind(':first_letter', $first_letter . '%', PDO::PARAM_STR);
        $this->db->bind(':exact', $search_term . '%', PDO::PARAM_STR);
        $this->db->bind(':starts_with', $search_term . '%', PDO::PARAM_STR);
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);

        return $this->db->resultSet();
    }

    public function getReceptionistsByFirstLetter($letter, $limit = 10) {
        $this->db->query('SELECT r.*, i.institution_name, i.institution_city, i.institution_state 
                     FROM receptionists r 
                     LEFT JOIN institutions i ON r.institution_id = i.institution_id
                     WHERE r.receptionist_name LIKE :letter 
                     ORDER BY r.receptionist_name ASC 
                     LIMIT :limit');

        $this->db->bind(':letter', $letter . '%', PDO::PARAM_STR);
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);

        return $this->db->resultSet();
    }

}












?>