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
    //    print_r($id);
        //CREATING NEW MODEL HERE REDUNDANT AFTER CONSTRUCT MODEL
        $this->newModel = $this->model('Institution');

        $id = $id[0];
        $returned_institution = $this->newModel->getInstitutionbyId($id);

        // $institution_name= $returned_institution["institution_name"];
        // $institution_id = $returned_institution["institution_id"];
        //could use $id of the one passed in or from the returned array institution row 
        
        //checek in model for if institution_id is in any record of institution_reviews
        $all_institutions_reviews_results = $this->newModel->if_institution_id_is_in_record_of_institution_reviews($id);


        // if($institutions_reviews_results) {
        //     var_dump($institutions_reviews_results);
        //     echo "<br>";
        //     echo "<br>";
        //     echo "<br>";

        //     // echo ".....................institution_review_results[0]; ";
        //     // print_r($institutions_reviews_results[0]);
        //     foreach($institutions_reviews_results as $comment) {
        //         echo "<br>";
        //         echo "<br>";
    
        //         echo "...................................: " . $comment['institution_review_id'];
        //         echo "<br>";
        //         echo "...................................: " . $comment['institution_comment'];
        //         echo "<br>";
        //         echo "<br>";
        //     }
        //     echo "<br>";
        //     echo "<br>";
        //     echo "<br>";
        //     echo "<br>";
        //     $reduced_one_array = $institutions_reviews_results[0];
        //     echo "<br>";
        //     echo " ...................fewfewokfowkefowkfef: " . $reduced_one_array["institution_comment"];
            
        //     // print_r($institutions_reviews_results);
        //     // var_dump($institutions_reviews_results);

        // }
        $data = [$returned_institution, $all_institutions_reviews_results];
        print_r($data);
        var_dump(array_values($data));

        
        if($all_institutions_reviews_results) {
            $this->view("institutions/about", $data);
        } else {
            $this->view("institutions/about");
        }
    // $this->view('institutions/about');
 
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

    public function show() {
        //if does not exist 
            //create a new institution 
        //else
            //show all institution pages
        $this->view("institutions/institutionshow");
    }

    // public function about() {
    //     // echo "<br>";
    //     echo "this is about";
    //     // echo "<br>";
    //     // print_r($theparams);
    // }
}


