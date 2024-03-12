<?php

class FormValidator {
    private $data;
    private $errors = [];
    private static $fields = ['email', 'password', 'confirm_password'];

    public function __construct($post_data){
        $this->data = $post_data;
    }

    public function validateForm() {
        foreach (self::$fields as $field) {
            if (!array_key_exists($field, $this->data)) {
                trigger_error("$field is not present in data");
                return;
            }
        }

        $this->validateEmail();
        $this->validatePassword();
        $this->validateConfirmPassword();
        return $this->errors;
    }

    private function validateEmail() {
        $val = trim($this->data['email']);

        if (empty($val)) {
            $this->addError('email', 'Email cannot be empty');
        } else {
            if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'Email must be a valid email address');
            }
        }
    }

    private function validatePassword() {
        $val = trim($this->data['password']);

        if (empty($val)) {
            $this->addError('password', 'Password cannot be empty');
        } else {
            if (strlen($val) < 6) {
                $this->addError('password', 'Password must be at least 6 characters long');
            }
        }
    }

    private function validateConfirmPassword() {
        $password = trim($this->data['password']);
        $confirm_password = trim($this->data['confirm_password']);

        if (empty($confirm_password)) {
            $this->addError('confirm_password', 'Confirm password cannot be empty');
        } else {
            if ($password !== $confirm_password) {
                $this->addError('confirm_password', 'Passwords do not match');
            }
        }
    }

    private function addError($key, $val) {
        $this->errors[$key] = $val;
    }
}

