<?php


class Receptionists extends Controller {
    private $receptionistModel;
    private $reviewModel;
    private $institutionModel;
    public function __construct() {
        // echo $_GET['url'];
        $this->receptionistModel = $this->model("Receptionist");
        $this->reviewModel = $this->model('Review');
        $this->institutionModel = $this->model('Institution');
    }

    public function index() {
        if(isset($_POST['input'])) {
            $input = $_POST['input'];
            // $this->institutionModel->query("SELECT * FROM institutions WHERE institution_name = :input");
            $stmt = $this->receptionistModel->query("SELECT * FROM receptionists WHERE receptionist_name = :input");
        // $this->institutionModel->bind(':input', $input, PDO::PARAM_STR);
       
            $stmt->bind(':input', $input, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            header('Content-Type: text/plain');
            if ($result) {
                print_r($result);
                // $this->view('institutions/institutionview', $result);
                foreach ($result as $key => $value) {
                    echo "{$key}: {$value}\n";
                }
            } else {
                echo "No results found";
            }
    
        } else {
            $this->view('receptionists/receptionistview');

            // header('HTTP/1.1 400 Bad Request');
            // Echo the error in plain text instead of json
            // echo "Error: Input not provided";
            
            // $this->view('institutions/institutionview');
        }

        // $this->view('receptionists/receptionistview', ['title'=>'welcome']);
    }


    public function show() {
        if(isset($_POST['input_receptionist_name'])) {
            $receptionist_name = trim($_POST['input_receptionist_name']);

            // Try exact match first
            $returned_name = $this->receptionistModel->getReceptionistbyName($receptionist_name);

            if($returned_name && count($returned_name) > 0) {
                if(count($returned_name) == 1) {
                    // Single result - redirect
                    $receptionist = $returned_name[0];
                    $receptionist_id = is_array($receptionist) ? $receptionist['receptionist_id'] : $receptionist->receptionist_id;
                    redirect('receptionists/about/' . $receptionist_id);
                } else {
                    // Multiple results
                    $data = [
                        'receptionists' => $returned_name,
                        'search_term' => $receptionist_name,
                        'message' => 'Found ' . count($returned_name) . ' results for "' . htmlspecialchars($receptionist_name) . '"'
                    ];
                    $this->view('receptionists/searchresults', $data);
                }
            } else {
                // Show suggestions
                $similar = $this->receptionistModel->searchSimilarReceptionists($receptionist_name, 10);

                if($similar && count($similar) > 0) {
                    $data = [
                        'receptionists' => $similar,
                        'search_term' => $receptionist_name,
                        'message' => 'No exact match found for "' . htmlspecialchars($receptionist_name) . '". Did you mean one of these?',
                        'is_suggestion' => true
                    ];
                    $this->view('receptionists/searchresults', $data);
                } else {
                    // By first letter
                    $first_letter = substr($receptionist_name, 0, 1);
                    $by_letter = $this->receptionistModel->getReceptionistsByFirstLetter($first_letter, 10);

                    $data = [
                        'receptionists' => $by_letter,
                        'search_term' => $receptionist_name,
                        'message' => 'No results found for "' . htmlspecialchars($receptionist_name) . '". Here are receptionists starting with "' . strtoupper($first_letter) . '"',
                        'is_suggestion' => true
                    ];
                    $this->view('receptionists/searchresults', $data);
                }
            }
        } else {
            redirect('homepages/index');
        }
    }

//about are the Receptionist Reviews, and can be the left comments in Hathway Bros sight next to ontop of under song lyrics or a wave line
//    public function about($id) {
//        $id = $id[0];
//
//        $returned_receptionist = $this->receptionistModel->getReceptionistbyId($id);
//
//        $all_receptionists_reviews_results = $this->receptionistModel->if_receptionist_id_is_in_record_of_reception_reviews($id);
//
//        // Get average rating
//        $rating_data = $this->reviewModel->getReceptionistAverageRating($id);
//
//        // Check if current user has reviewed
//        $user_review = false;
//        if(isLoggedIn()) {
//            $user_review = $this->reviewModel->hasUserReviewedReceptionist($id, $_SESSION['user_id']);
//        }
//
//        $data = [
//            'receptionist' => $returned_receptionist,
//            'reviews' => $all_receptionists_reviews_results,
//            'avg_rating' => $rating_data->avg_rating ?? 0,
//            'review_count' => $rating_data->review_count ?? 0,
//            'user_review' => $user_review
//        ];
//
//        // print_r($data);
//
//        if($all_receptionists_reviews_results) {
//            $this->view("receptionists/about", $data);
//        } else {
//            $this->view("receptionists/about", $data);
//        }
//
//
//    }
    public function about($id) {
        $id = $id[0];

        $receptionist = $this->receptionistModel->getReceptionistbyId($id);
        $reviews = $this->reviewModel->getReceptionistReviews($id);

        // Get average rating
        $rating_data = $this->reviewModel->getReceptionistAverageRating($id);

        // Check if current user has reviewed
        $user_review = false;
        if(isLoggedIn()) {
            $user_review = $this->reviewModel->hasUserReviewedReceptionist($id, $_SESSION['user_id']);
        }

        $data = [
            'receptionist' => $receptionist,
            'reviews' => $reviews,
            'avg_rating' => is_array($rating_data) ? ($rating_data['avg_rating'] ?? 0) : ($rating_data->avg_rating ?? 0),
            'review_count' => is_array($rating_data) ? ($rating_data['review_count'] ?? 0) : ($rating_data->review_count ?? 0),
            'user_review' => $user_review
        ];

        $this->view("receptionists/about", $data);
    }

    // Show add receptionist form
    public function add() {
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $name = trim($_POST['receptionist_name']);
            $institution_id = trim($_POST['institution_id']);

            // Validate
            if(empty($name) || empty($institution_id)) {
                flash('add_message', 'Please fill in all fields', 'alert alert-danger');
                $institutions = $this->institutionModel->getAllInstitutions();
                $data = [
                    'receptionist_name' => $name,
                    'institution_id' => $institution_id,
                    'institutions' => $institutions
                ];
                $this->view('receptionists/add', $data);
                return;
            }

            // Add receptionist
            $receptionist_id = $this->receptionistModel->addReceptionist($name, $institution_id);

            if($receptionist_id) {
                flash('add_message', 'Receptionist added successfully!', 'alert alert-success');
                redirect('receptionists/about/' . $receptionist_id);
            } else {
                flash('add_message', 'Something went wrong. Please try again.', 'alert alert-danger');
                $institutions = $this->institutionModel->getAllInstitutions();
                $data = [
                    'receptionist_name' => $name,
                    'institution_id' => $institution_id,
                    'institutions' => $institutions
                ];
                $this->view('receptionists/add', $data);
            }

        } else {
            // Show form
            $institutions = $this->institutionModel->getAllInstitutions();
            $data = [
                'receptionist_name' => '',
                'institution_id' => '',
                'institutions' => $institutions
            ];
            $this->view('receptionists/add', $data);
        }
    }

    // Submit or update review for receptionist
    public function submitReview($receptionist_id) {
        if(!isLoggedIn()) {
            redirect('users/login');
        }
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'receptionist_id' => $receptionist_id[0],
                'user_id' => $_SESSION['user_id'],
                'comment' => trim($_POST['comment']),
                'stars' => $_POST['stars'],
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
                if($this->reviewModel->upsertReceptionistReview($data['receptionist_id'], $data['user_id'], $data['comment'], $data['stars'])) {
                    flash('review_message', 'Review submitted successfully');
                    redirect('receptionists/about/' . $data['receptionist_id']);
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                redirect('receptionists/about/' . $data['receptionist_id']);
            }
        } else {
            redirect('receptionists');
        }
    }




}

