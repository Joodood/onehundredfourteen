<?php

class Dashboard extends Controller {
    private $reviewModel;
    private $institutionModel;
    private $receptionistModel;

    public function __construct() {

        $this->reviewModel = $this->model('Review');
        $this->institutionModel = $this->model('Institution');
        $this->receptionistModel = $this->model('Receptionist');
    }

    public function index() {
//        if(!isLoggedIn()) {
//            redirect('users/login');
//        }

        $user_id = $_SESSION['user_id'];
        
        // Get user's institution reviews
        $institution_reviews = $this->reviewModel->getUserInstitutionReviews($user_id);
        
        // Get user's receptionist reviews
        $receptionist_reviews = $this->reviewModel->getUserReceptionistReviews($user_id);
        
        $data = [
            'institution_reviews' => $institution_reviews,
            'receptionist_reviews' => $receptionist_reviews,
            'user_email' => $_SESSION['user_email']
        ];
        
        $this->view('dashboard/index', $data);
    }
    
    // Delete institution review
    public function deleteInstitutionReview($review_id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_id = $_SESSION['user_id'];
            
            // Verify the review belongs to the user
            if($this->reviewModel->verifyInstitutionReviewOwnership($review_id[0], $user_id)) {
                if($this->reviewModel->deleteInstitutionReview($review_id[0])) {
                    flash('review_message', 'Review deleted successfully');
                    redirect('dashboard');
                } else {
                    die('Something went wrong');
                }
            } else {
                redirect('dashboard');
            }
        } else {
            redirect('dashboard');
        }
    }
    
    // Delete receptionist review
    public function deleteReceptionistReview($review_id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user_id = $_SESSION['user_id'];
            
            // Verify the review belongs to the user
            if($this->reviewModel->verifyReceptionistReviewOwnership($review_id[0], $user_id)) {
                if($this->reviewModel->deleteReceptionistReview($review_id[0])) {
                    flash('review_message', 'Review deleted successfully');
                    redirect('dashboard');
                } else {
                    die('Something went wrong');
                }
            } else {
                redirect('dashboard');
            }
        } else {
            redirect('dashboard');
        }
    }
}
