<?php
// require_once "../app/models/Institution.php"; 
// require_once "../app/libraries/Database.php";

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

//about are the Institution Reviews
    public function about($id) {
    //    print_r($id);
        //CREATING NEW MODEL HERE REDUNDANT AFTER CONSTRUCT MODEL
        // $this->newModel = $this->model('Institution');

        $id = $id[0];
        // $returned_institution = $this->newModel->getInstitutionbyId($id);
        $returned_institution = $this->institutionModel->getInstitutionbyId($id);


        // $institution_name= $returned_institution["institution_name"];
        // $institution_id = $returned_institution["institution_id"];
        //could use $id of the one passed in or from the returned array institution row 
        //checek in model for if institution_id is in any record of institution_reviews
        // $all_institutions_reviews_results = $this->newModel->if_institution_id_is_in_record_of_institution_reviews($id);
        $all_institutions_reviews_results = $this->institutionModel->if_institution_id_is_in_record_of_institution_reviews($id);






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
        // var_dump(array_values($data));

        
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
        //worked with the get, or unspecified
        // echo ".....................yo";
        // if (isset($_GET['input_institution_name'])) {
        //     $inputValue = $_GET['input_institution_name'];
        //     echo $inputValue;
        //     // Use $inputValue as needed
        // }
        //try with post 
        // $this->newModel = $this->model('Institution');

        if(isset($_POST['input_institution_name'])) {
            echo ".................: " . $_POST['input_institution_name'];

                $institution_name = $_POST['input_institution_name'];
                // echo gettype($inputInstitutionName);
                // $inputInstitutionName = isset($_POST['input_institution_name']) ? $_POST['input_institution_name'] : '';

                // $this->newModel = $this->model('Institution');

                $returned_name = $this->institutionModel->getInstitutionbyName($institution_name);
                // var_dump($returned_name);
                // $row = $this->institutionModel->getInstitutionbyName($inputInstitutionName);
                
                //you haven't yet. but foreach through the results if theres more than one
                if($returned_name) {
                    foreach($returned_name as $institutions_rows) {
                        //if state and city are the same in each array, 
                        echo "<br>";
                        print_r($institutions_rows);
                    }
                    // print_r($returned_name);
                } else {
                    echo ".....................No results Found";
                }
        }




        
        // $input = $_POST["input_institution_name"];
        // echo $input;

        // echo "......................" . echo $_POST["live_search"];


        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     echo ".....................POST is method";
        //     if (isset($_POST['input_institution_name'])) {
        //         // Access the value sent from the form
        //         $inputInstitutionName = $_POST['input_institution_name'];
        //         // $inputInstitutionName = isset($_POST['input_institution_name']) ? $_POST['input_institution_name'] : '';

        //         $row = $this->institutionModel->getInstitutionbyName($inputInstitutionName);
                
        //         if($row) {
        //             print_r($row);
        //         } else {
        //             echo ".....................No results Found";
        //         }
        //         // Now you can use $inputValue for further processing
        //         // For example, fetching data from a database based on the input
        //     } else {
        //         // Handle the case where the input field is not set or empty
        //     }
        //     // Now you can use $inputInstitutionName in your controller
        // }


        
        // if(isset($_POST['input_institution_name'])) {
        //     echo "Inputted text: " . $_POST['input_institution_name'];
        // }
        // input_institution_name
        //if does not exist 
            //create a new institution 
        //else
            //show all institution pages
        $this->view("institutions/institutionshow");
    }

    public function add() {
        //check to see if filled institution alreday exists
        $institution_name= $_POST['institution_name'];
        $institution_city= $_POST['institution_city'];
        $institution_state= $_POST['institution_state'];
        $this->institutionModel->check_if_institution_already_exists($institution_name);

    }

    // public function about() {
    //     // echo "<br>";
    //     echo "this is about";
    //     // echo "<br>";
    //     // print_r($theparams);
    // }



}


