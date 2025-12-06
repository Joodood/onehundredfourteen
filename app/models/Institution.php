<?php



class Institution {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // public function Institutions() {
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
    public function livesearchInstitutionAll($input) {
        $query = 'SELECT * FROM institutions WHERE institutionName = :institutionName LIKE ?';
        // $this->db->query('SELECT * FROM institutions WHERE institutionName LIKE ?');
        
        $stmt = $this->db->query($query);

        $params = array($input);

        $stmt2 = $stmt->execute($params);

        return $stmt2;

    }


    // public function searchInstitution($)

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


    public function getInstitutionbyId($institution_id) {
        $this->db->query('SELECT * FROM institutions WHERE institution_id =:institution_id');
        $this->db->bind(':institution_id', $institution_id, PDO::PARAM_INT);
        $row = $this->db->single();
        return $row;
    }

    public function getInstitutionbyName($institution_name) {
        $this->db->query('SELECT * FROM institutions WHERE institution_name =:institution_name');
        $this->db->bind(':institution_name', $institution_name, PDO::PARAM_STR);
        $row = $this->db->resultSet();
        return $row;
    }

            //checek in model for if institution_id is in any record of institution_reviews
    public function if_institution_id_is_in_record_of_institution_reviews($institution_id) {
        $this->db->query('SELECT * FROM institutions_reviews WHERE institution_id =:institution_id');
        $this->db->bind(':institution_id', $institution_id, PDO::PARAM_INT);
        $row = $this->db->resultSet();
        return $row;
    }

    public function check_if_institution_already_exists($institution_name) {
        
        $this->db->query('SELECT * FROM institutions WHERE institution_name = "" AND institution_city = "" AND institution_state = ""');


    }
    
    // Get all institutions
    public function getAllInstitutions() {
        $this->db->query('SELECT * FROM institutions ORDER BY institution_name ASC');
        return $this->db->resultSet();
    }
    
    // Add new institution
    public function addInstitution($name, $city, $state) {
        $this->db->query('INSERT INTO institutions (institution_name, institution_city, institution_state) 
                         VALUES (:name, :city, :state)');
        $this->db->bind(':name', $name, PDO::PARAM_STR);
        $this->db->bind(':city', $city, PDO::PARAM_STR);
        $this->db->bind(':state', $state, PDO::PARAM_STR);
        
        if($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    // Search for similar institution names
    public function searchSimilarInstitutions($search_term, $limit = 5) {
        // Get institutions that start with the same letter or contain the search term
        $first_letter = substr($search_term, 0, 1);

        $this->db->query('SELECT * FROM institutions 
                     WHERE institution_name LIKE :search_term 
                     OR institution_name LIKE :first_letter
                     ORDER BY 
                        CASE 
                            WHEN institution_name LIKE :exact THEN 1
                            WHEN institution_name LIKE :starts_with THEN 2
                            ELSE 3
                        END,
                        institution_name ASC
                     LIMIT :limit');

        $this->db->bind(':search_term', '%' . $search_term . '%', PDO::PARAM_STR);
        $this->db->bind(':first_letter', $first_letter . '%', PDO::PARAM_STR);
        $this->db->bind(':exact', $search_term . '%', PDO::PARAM_STR);
        $this->db->bind(':starts_with', $search_term . '%', PDO::PARAM_STR);
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);

        return $this->db->resultSet();
    }

// Get institutions starting with a specific letter
    public function getInstitutionsByFirstLetter($letter, $limit = 10) {
        $this->db->query('SELECT * FROM institutions 
                     WHERE institution_name LIKE :letter 
                     ORDER BY institution_name ASC 
                     LIMIT :limit');

        $this->db->bind(':letter', $letter . '%', PDO::PARAM_STR);
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);

        return $this->db->resultSet();
    }



}












?>