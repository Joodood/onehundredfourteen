<?php
require_once "../app/models/Institution.php"; 
require_once "../app/libraries/Database.php";

class Institutions extends Controller {
    
    protected $institutionModel;
    protected static $database;

    public function __construct() {
        $this->institutionModel = $this->model('Institution');
        self::$database = new Database();

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
        $single_institution = $this->institutionModel->getInstitutionbyId(1);
        $data = ['single_institution' => $single_institution];

        // echo "this is index";
        // echo $params;

        // echo $id;
//, ['title' => 'Welcome']

        

        $this->view('institutions/institutionview', ['title'=>'welcome']);

        // $this->view('')
    }


    public function about() {
       
        // echo "this is about";
        // $this->

        // echo $params;

 
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


