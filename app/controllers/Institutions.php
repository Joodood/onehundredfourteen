<?php
require_once "../app/models/Institution.php"; 
require_once "../app/libraries/Database.php";

class Institutions extends Controller {
    
    // protected $institutionModel;
    // protected static $database;

    public function __construct() {
        $this->institutionModel = $this->model('Institution');
        // self::$database = new Database();

        // if(!self::$database->connect()) {

        // }

        // echo 'Homepages loaded';
        // echo "<br>"; 
        // echo $_GET['url'];
        // echo "<br>";
        // echo $_SERVER['REQUEST_METHOD'];
        // echo "<br>";
        // echo $_SERVER['REQUEST_URI'];
        // echo "<br>";
        // echo phpinfo();
        // phpinfo();

        // $this->institutionModel = $this->model('Institution');
    }

    

    public function index() {
        if(isset($_POST['input'])) {
            $input = $_POST['input'];
            // $this->institutionModel->query("SELECT * FROM institutions WHERE institution_name = :input");
            $stmt = $this->institutionModel->query("SELECT * FROM institutions WHERE institution_name = :input");
        // $this->institutionModel->bind(':input', $input, PDO::PARAM_STR);
       
            $stmt->bind(':input', $input, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            header('Content-Type: text/plain');
            if ($result) {
                // print_r($result);
                // $this->view('institutions/institutionview', $result);
                foreach ($result as $key => $value) {
                    echo "{$key}: {$value}\n";
                }
            } else {
                echo "No results found";
            }
    
        } else {
            $this->view('institutions/institutionview', ['title'=>'welcome']);

            // header('HTTP/1.1 400 Bad Request');
            // Echo the error in plain text instead of json
            // echo "Error: Input not provided";
            
            // $this->view('institutions/institutionview');
        }
        // $single_institution = $this->institutionModel->getInstitutionbyId(1);
        // $data = ['single_institution' => $single_institution];



        // echo "this is index";
        // echo $params;

        // echo $id;
//, ['title' => 'Welcome']

        

        // $this->view('institutions/institutionview', ['title'=>'welcome']);

        // $this->view('')
    }


    public function about($id) {
//        print_r($id);

        $this->newModel = $this->model('Institution');

        $id = $id[0];
        $returned_institution = $this->newModel->getInstitutionbyId($id);

        $this->view('institutions/about', $returned_institution);

 
    }

    public function getAction($action) {
        $single_institution = $this->institutionModel->getInstitutionbyId(1);

    }

    public static function ajaxRequest($action) {
        // require_once "../app/models/" . 'Institution' . ".php";
        // $Init = new Institutions();

        // return new $model();
        

        // var_dump($action);

        // return $action;

        // $params = array($action);
        // $this->view('institutions/institutionview', [$action]);

        // $result = self::$database->prepare("SELECT * FROM institutions WHERE institution_name LIKE ?");
        
        

        // $result->execute($params);
        
        // var_dump($result);

        // $this::institutionModel->getInstitutionbyId(1);
        // echo "hereeefffffffffffffffffffffffffffffffffffff";
    //    echo "...................................." . gettype($action);
        // var_dump($action);
        // echo $action;

    }

    // public function about() {
    //     // echo "<br>";
    //     echo "this is about";
    //     // echo "<br>";
    //     // print_r($theparams);
    // }
}


