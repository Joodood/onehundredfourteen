<?php 


class Users extends Controller {

    private $userModel;
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
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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
        redirect('dashboard');
    }
    
    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        session_destroy();
        redirect('users/login');
    }

    public function legal() {
        $this->view("users/legalview");
    }

    // Settings page
    public function settings() {
        // Check if logged in
        if(!isLoggedIn()) {
            redirect('users/login');
        }

        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Check which form was submitted
            if(isset($_POST['change_password'])) {
                $this->changePassword();
            } elseif(isset($_POST['delete_account'])) {
                $this->deleteAccount();
            }
        } else {
            // Show settings page
            $data = [
                'user_email' => $_SESSION['user_email']
            ];
            $this->view('users/settings', $data);
        }
    }

// Change password
    private function changePassword() {
        $current_password = trim($_POST['current_password']);
        $new_password = trim($_POST['new_password']);
        $confirm_password = trim($_POST['confirm_password']);

        // Validate
        if(empty($current_password) || empty($new_password) || empty($confirm_password)) {
            flash('password_message', 'Please fill in all fields', 'alert alert-danger');
            redirect('users/settings');
            return;
        }

        if($new_password !== $confirm_password) {
            flash('password_message', 'New passwords do not match', 'alert alert-danger');
            redirect('users/settings');
            return;
        }

        if(strlen($new_password) < 6) {
            flash('password_message', 'Password must be at least 6 characters', 'alert alert-danger');
            redirect('users/settings');
            return;
        }

        // Verify current password
        $user = $this->userModel->getUserById($_SESSION['user_id']);
        if(!$user) {
            flash('password_message', 'User not found', 'alert alert-danger');
            redirect('users/settings');
            return;
        }

        // Check current password
        $user_array = is_array($user) ? $user : (array)$user;
        if(!password_verify($current_password, $user_array['password'])) {
            flash('password_message', 'Current password is incorrect', 'alert alert-danger');
            redirect('users/settings');
            return;
        }

        // Update password
        if($this->userModel->updatePassword($_SESSION['user_id'], $new_password)) {
            flash('password_message', 'Password updated successfully!', 'alert alert-success');
            redirect('users/settings');
        } else {
            flash('password_message', 'Something went wrong. Please try again.', 'alert alert-danger');
            redirect('users/settings');
        }
    }

// Delete account
    private function deleteAccount() {
        $password = trim($_POST['delete_password']);
        $confirm = isset($_POST['delete_confirm']);

        if(empty($password)) {
            flash('delete_message', 'Please enter your password', 'alert alert-danger');
            redirect('users/settings');
            return;
        }

        if(!$confirm) {
            flash('delete_message', 'Please confirm account deletion', 'alert alert-danger');
            redirect('users/settings');
            return;
        }

        // Verify password
        $user = $this->userModel->getUserById($_SESSION['user_id']);
        if(!$user) {
            flash('delete_message', 'User not found', 'alert alert-danger');
            redirect('users/settings');
            return;
        }

        $user_array = is_array($user) ? $user : (array)$user;
        if(!password_verify($password, $user_array['password'])) {
            flash('delete_message', 'Password is incorrect', 'alert alert-danger');
            redirect('users/settings');
            return;
        }

        // Delete account
        if($this->userModel->deleteUser($_SESSION['user_id'])) {
            // Destroy session
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            session_destroy();

            flash('register_success', 'Your account has been deleted', 'alert alert-info');
            redirect('users/register');
        } else {
            flash('delete_message', 'Something went wrong. Please try again.', 'alert alert-danger');
            redirect('users/settings');
        }
    }

}

