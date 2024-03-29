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



}












?>