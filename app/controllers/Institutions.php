<?php
// require_once "../app/models/Institution.php"; 
// require_once "../app/libraries/Database.php";

class Institutions extends Controller {
    
    // protected $institutionModel;
    // protected static $database;
    private $institutionModel;
    private $reviewModel;
    private $receptionistModel;

    public function __construct() {
        $this->institutionModel = $this->model('Institution');
        $this->reviewModel = $this->model('Review');
        $this->receptionistModel = $this->model('Receptionist');  // ADD THIS LINE


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
//    public function about($id) {
//        $id = $id[0];
//
//        $returned_institution = $this->institutionModel->getInstitutionbyId($id);
//        $all_institutions_reviews_results = $this->institutionModel->if_institution_id_is_in_record_of_institution_reviews($id);
//
//        // Get average rating
//        $rating_data = $this->reviewModel->getInstitutionAverageRating($id);
//
//        // Check if current user has reviewed
//        $user_review = false;
//        if(isLoggedIn()) {
//            $user_review = $this->reviewModel->hasUserReviewedInstitution($id, $_SESSION['user_id']);
//        }
//
//        $data = [
//            'institution' => $returned_institution,
//            'reviews' => $all_institutions_reviews_results,
//            'avg_rating' => is_array($rating_data) ? ($rating_data['avg_rating'] ?? 0) : ($rating_data->avg_rating ?? 0),
//            'review_count' => is_array($rating_data) ? ($rating_data['review_count'] ?? 0) : ($rating_data->review_count ?? 0),
//            'user_review' => $user_review
//        ];
//
//        $this->view("institutions/about", $data);
//    }
    public function about($id) {
        $id = $id[0];

        $returned_institution = $this->institutionModel->getInstitutionbyId($id);
        $all_institutions_reviews_results = $this->institutionModel->if_institution_id_is_in_record_of_institution_reviews($id);

        // Get average rating
        $rating_data = $this->reviewModel->getInstitutionAverageRating($id);

        // Get receptionists at this institution
        $receptionists = $this->receptionistModel->getReceptionistsByInstitution($id);

        // Check if current user has reviewed
        $user_review = false;
        if(isLoggedIn()) {
            $user_review = $this->reviewModel->hasUserReviewedInstitution($id, $_SESSION['user_id']);
        }

        $data = [
            'institution' => $returned_institution,
            'reviews' => $all_institutions_reviews_results,
            'avg_rating' => is_array($rating_data) ? ($rating_data['avg_rating'] ?? 0) : ($rating_data->avg_rating ?? 0),
            'review_count' => is_array($rating_data) ? ($rating_data['review_count'] ?? 0) : ($rating_data->review_count ?? 0),
            'user_review' => $user_review,
            'receptionists' => $receptionists  // NEW
        ];

        $this->view("institutions/about", $data);
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
        if(isset($_POST['input_institution_name'])) {
            $institution_name = trim($_POST['input_institution_name']);

            // Try exact match first
            $returned_name = $this->institutionModel->getInstitutionbyName($institution_name);

            if($returned_name && count($returned_name) > 0) {
                // Found exact matches
                if(count($returned_name) == 1) {
                    // Single result - redirect to institution page
                    $institution = $returned_name[0];
                    $institution_id = is_array($institution) ? $institution['institution_id'] : $institution->institution_id;
                    redirect('institutions/about/' . $institution_id);
                } else {
                    // Multiple results - show list
                    $data = [
                        'institutions' => $returned_name,
                        'search_term' => $institution_name,
                        'message' => 'Found ' . count($returned_name) . ' results for "' . htmlspecialchars($institution_name) . '"'
                    ];
                    $this->view('institutions/searchresults', $data);
                }
            } else {
                // No exact match - show "Did you mean?"
                $similar = $this->institutionModel->searchSimilarInstitutions($institution_name, 10);

                if($similar && count($similar) > 0) {
                    $data = [
                        'institutions' => $similar,
                        'search_term' => $institution_name,
                        'message' => 'No exact match found for "' . htmlspecialchars($institution_name) . '". Did you mean one of these?',
                        'is_suggestion' => true
                    ];
                    $this->view('institutions/searchresults', $data);
                } else {
                    // No results at all
                    $first_letter = substr($institution_name, 0, 1);
                    $by_letter = $this->institutionModel->getInstitutionsByFirstLetter($first_letter, 10);

                    $data = [
                        'institutions' => $by_letter,
                        'search_term' => $institution_name,
                        'message' => 'No results found for "' . htmlspecialchars($institution_name) . '". Here are institutions starting with "' . strtoupper($first_letter) . '"',
                        'is_suggestion' => true
                    ];
                    $this->view('institutions/searchresults', $data);
                }
            }
        } else {
            // No search term provided
            redirect('homepages/index');
        }
    }


//    public function show() {
//        //worked with the get, or unspecified
//        // echo ".....................yo";
//        // if (isset($_GET['input_institution_name'])) {
//        //     $inputValue = $_GET['input_institution_name'];
//        //     echo $inputValue;
//        //     // Use $inputValue as needed
//        // }
//        //try with post
//        // $this->newModel = $this->model('Institution');
//
//        if(isset($_POST['input_institution_name'])) {
//            echo ".................: " . $_POST['input_institution_name'];
//
//                $institution_name = $_POST['input_institution_name'];
//                // echo gettype($inputInstitutionName);
//                // $inputInstitutionName = isset($_POST['input_institution_name']) ? $_POST['input_institution_name'] : '';
//
//                // $this->newModel = $this->model('Institution');
//
//                $returned_name = $this->institutionModel->getInstitutionbyName($institution_name);
//                // var_dump($returned_name);
//                // $row = $this->institutionModel->getInstitutionbyName($inputInstitutionName);
//
//                //you haven't yet. but foreach through the results if theres more than one
//                if($returned_name) {
//                    foreach($returned_name as $institutions_rows) {
//                        //if state and city are the same in each array,
//                        echo "<br>";
//                        print_r($institutions_rows);
//                    }
//                    // print_r($returned_name);
//                } else {
//                    echo ".....................No results Found";
//                }
//        }
//
//
//
//
//
//        // $input = $_POST["input_institution_name"];
//        // echo $input;
//
//        // echo "......................" . echo $_POST["live_search"];
//
//
//        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//        //     echo ".....................POST is method";
//        //     if (isset($_POST['input_institution_name'])) {
//        //         // Access the value sent from the form
//        //         $inputInstitutionName = $_POST['input_institution_name'];
//        //         // $inputInstitutionName = isset($_POST['input_institution_name']) ? $_POST['input_institution_name'] : '';
//
//        //         $row = $this->institutionModel->getInstitutionbyName($inputInstitutionName);
//
//        //         if($row) {
//        //             print_r($row);
//        //         } else {
//        //             echo ".....................No results Found";
//        //         }
//        //         // Now you can use $inputValue for further processing
//        //         // For example, fetching data from a database based on the input
//        //     } else {
//        //         // Handle the case where the input field is not set or empty
//        //     }
//        //     // Now you can use $inputInstitutionName in your controller
//        // }
//
//
//
//        // if(isset($_POST['input_institution_name'])) {
//        //     echo "Inputted text: " . $_POST['input_institution_name'];
//        // }
//        // input_institution_name
//        //if does not exist
//            //create a new institution
//        //else
//            //show all institution pages
//        $this->view("institutions/institutionshow");
//    }

//    public function add() {
//        //check to see if filled institution alreday exists
//        $institution_name= $_POST['institution_name'];
//        $institution_city= $_POST['institution_city'];
//        $institution_state= $_POST['institution_state'];
//        $this->institutionModel->check_if_institution_already_exists($institution_name);
//
//    }
    public function add() {
        // Remove login check - anyone can add!

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $name = trim($_POST['institution_name']);
            $city = trim($_POST['institution_city']);
            $state = trim($_POST['institution_state']);

            if(empty($name) || empty($city) || empty($state)) {
                flash('add_message', 'Please fill in all fields', 'alert alert-danger');
                $data = [
                    'institution_name' => $name,
                    'institution_city' => $city,
                    'institution_state' => $state
                ];
                $this->view('institutions/add', $data);
                return;
            }

            // Check if already exists
            $existing = $this->institutionModel->getInstitutionbyName($name);
            if($existing && count($existing) > 0) {
                // Show existing instead of error
                flash('add_message', 'This institution already exists!', 'alert alert-info');
                $institution = $existing[0];
                $institution_id = is_array($institution) ? $institution['institution_id'] : $institution->institution_id;
                redirect('institutions/about/' . $institution_id);
                return;
            }

            $institution_id = $this->institutionModel->addInstitution($name, $city, $state);

            if($institution_id) {
                flash('add_message', 'Institution added successfully! Scroll down to add your review.', 'alert alert-success');
                redirect('institutions/about/' . $institution_id . '#review-form');
            }else {
                flash('add_message', 'Something went wrong. Please try again.', 'alert alert-danger');
                $data = [
                    'institution_name' => $name,
                    'institution_city' => $city,
                    'institution_state' => $state
                ];
                $this->view('institutions/add', $data);
            }

        } else {
            $data = [
                'institution_name' => '',
                'institution_city' => '',
                'institution_state' => ''
            ];
            $this->view('institutions/add', $data);
        }
    }

    public function submitReview($institution_id) {
        // Check if logged in
        if(!isLoggedIn()) {
            flash('review_message', 'Please login to submit a review', 'alert alert-danger');
            redirect('institutions/about/' . $institution_id[0]);
            return;
        }

        // Extract ID from array
        $institution_id = $institution_id[0];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'institution_id' => $institution_id,  // FIXED: removed [0]
                'user_id' => $_SESSION['user_id'],
                'comment' => trim($_POST['comment']),
                'stars' => intval($_POST['stars']),
                'comment_err' => '',
                'stars_err' => ''
            ];

            // Validate data
            if(empty($data['comment'])) {
                $data['comment_err'] = 'Please enter a comment';
            }

            if(empty($data['stars']) || $data['stars'] < 1 || $data['stars'] > 5) {
                $data['stars_err'] = 'Please select a star rating between 1 and 5';
            }

            // Make sure no errors
            if(empty($data['comment_err']) && empty($data['stars_err'])) {
                // UPSERT review
                if($this->reviewModel->upsertInstitutionReview($data['institution_id'], $data['user_id'], $data['comment'], $data['stars'])) {
                    flash('review_message', 'Review submitted successfully!', 'alert alert-success');
                    redirect('institutions/about/' . $data['institution_id']);
                } else {
                    flash('review_message', 'Something went wrong. Please try again.', 'alert alert-danger');
                    redirect('institutions/about/' . $data['institution_id']);
                }
            } else {
                // Load view with errors
                flash('review_message', 'Please fix the errors: ' . $data['comment_err'] . ' ' . $data['stars_err'], 'alert alert-danger');
                redirect('institutions/about/' . $data['institution_id']);
            }
        } else {
            redirect('institutions');
        }
    }
    // public function about() {
    //     // echo "<br>";
    //     echo "this is about";
    //     // echo "<br>";
    //     // print_r($theparams);
    // }



}


