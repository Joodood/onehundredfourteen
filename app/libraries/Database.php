<?php 



class Database {
    private $host = DB_HOST;   
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    private $dbport = DB_PORT;
    
    private $dbh;
    private $stmt;
    private $error;  


    public function __construct() {
        //Set DSN
        $dsn = 'mysql:host=' . $this->host . ";port=" . $this->dbport . ';dbname=' . $this->dbname;
        $options = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    //CREATE PDO INSTANCE

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
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
        $this->stmt->bindValue($param, $value, $type);

    }

    public function execute() {
        return $this->stmt->execute();
    }


    public function resultSet() {
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single() {
        $this->stmt->execute();
//        return $this->stmt->fetch(PDO::FETCH_OBJ);
        return $this->stmt->fetch();

    }
    public function rowCount() {
        return $this->stmt->rowCount();
    }


    public function search($input) {
        $this->stmt = $this->dbh->prepare("SELECT * FROM institutions WHERE institutionName = :input");
        $this->stmt->bindParam(':input', $input, PDO::PARAM_STR);
        $this->stmt->execute();
        return $this->stmt->fetchAll();

    }

    // public function searchrec($input) {
    //     $this->stmt = $this->dbh->prepare("SELECT * FROM receptionists WHERE receptionist_name = :input");
    //     $this->stmt->bindParam(':input', $input, PDO::PARAM_STR);
    //     $this->stmt->execute();
    //     return $this->stmt->fetch(PDO::FETCH_ASSOC);
    // }

    public function get_inst_by_id($id) {
        $this->stmt = $this->dbh->prepare("SELECT * FROM institutions WHERE institution_id = :id");
        $this->stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $this->stmt->execute();
        return $this->stmt->fetchAll();
}

    public function se($input) {
        // Your database query logic here, for example:
        $this->stmt = $this->dbh->prepare("SELECT * FROM receptionists WHERE receptionist_name = :input");
        $this->stmt->bindParam(':input', $input, PDO::PARAM_STR);
        $this->stmt->execute();
        return $this->stmt->fetchAll();
    }

    public function same_as_se($input) {
        $this->stmt = $this->dbh->prepare("SELECT * FROM receptionists WHERE receptionist_name = :input");
        $this->stmt->bindParam(':input', $input, PDO::PARAM_STR);
        $this->stmt->execute();
        return $this->stmt->fetchAll();
    }

//    public function recsatinst($input, $institution_id) {
//        //if $input matches receptionist name and
////        $this->stmt = $this->dbh->prepare("SELECT * FROM receptionists WHERE receptionist_name = :input and institution_id = :institution_id");
//        $this->stmt = $this->dbh->prepare("SELECT * FROM receptionists WHERE receptionist_name = :input");
//
//        $this->stmt->bindParam(':input', $input, PDO::PARAM_STR);
////        $this->stmt->bindParam(':institution_id', $institution_id, PDO::PARAM_INT);
//        $this->stmt->execute();
//        return $this->stmt->fetchAll();
//    }

}


?>