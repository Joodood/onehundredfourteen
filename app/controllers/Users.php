<?php 


class Users extends Controller {


    public function __construct() {
        $this->userModel = $this->model('User');

    }

    public function index() {

    }

    public function register() {
        if(isset($_POST['Submit'])) {
            require "FormValidator.php";
    
            $validation = new FormValidator($_POST);
            $errors = $validation->validateForm();
    
            // Check if email already exists
            if($this->userModel->emailExists($_POST['email'])) {
                $errors['email'] = "This email address has already been added.";
            }
    
            if(empty($errors)) {
                // Proceeds with registration as no errors exist
                $email = $_POST['email']; // Sanitize this input
                $password = $_POST['password']; // Sanitize and hash this password
                $this->userModel->InsertIntoDatabase($email, $password); // Adjust the method name as per your model
                redirect('users/login');
            } else {
                // Pass errors to the view
                $this->view('users/registerview', ['errors' => $errors]);
            }
        } else {
            // If not submitting, just show the registration view
            $this->view('users/registerview', []);
        }
    }
    

    public function login() {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            // Init data
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
    
            // Validation
            $errors = [
                'email' => '',
                'password' => '',
            ];
    
            // Email validation
            if (empty($email)) {
                $errors['email'] = 'Please enter email.';
            }
    
            // Password validation
            if (empty($password)) {
                $errors['password'] = 'Please enter password.';
            }
    
            // Attempt login if no validation errors
            if (empty($errors['email']) && empty($errors['password'])) {
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($email, $password);
    
                if ($loggedInUser) {
                    // Create session
                    $this->createUserSession($loggedInUser);
                } else {
                    $errors['password'] = 'Password incorrect or user does not exist.';
                    // Passing errors under 'errors' key
                    $this->view('users/loginview', ['errors' => $errors]);
                }
            } else {
                // Load view with errors under 'errors' key
                $this->view('users/loginview', ['errors' => $errors]);
            }
    
        } else {
            // Init data for GET request
            $data = [
                'email' => '',
                'password' => '',
                'errors' => [
                    'email' => '',
                    'password' => '',
                ]
            ];
    
            // Load view
            $this->view('users/loginview', $data);
        }
    }
    
    

    public function createUserSession($loggedInUser) {
        //setting the user_id to a session variable
        //do the same for the email and the name
        $_SESSION['user_id'] = $loggedInUser->id;
        $_SESSION['user_email'] = $loggedInUser->email;
        // $_SESSION['user_name'] = $loggedInUser->name;
        //redirect to a certain location/file after loggint in
        redirect('users/Institutions');
    }

    public function legal() {
        $this->view("users/legalview");
    }

}

