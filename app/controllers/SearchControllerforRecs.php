<?php

require_once "../app/helpers/url_helper.php";

// require_once "../app/libraries/Database.php";

class SearchControllerforRecs extends Controller {
    private $database;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    public function index() {
        
    }

    public function search() {
        $input = isset($_POST['input']) ? $_POST['input'] : '';
    
        // Perform database query based on the input
        $result = $this->database->se($input);
    
        if ($result === false) {
            // If the result is false, handle the error or simply set $result to an empty array
            // so the foreach loop below is skipped.
            $result = [];
            // Optionally, add error logging or user feedback here.
        }
    
        // $output = '';
        foreach ($result as $item) {
            // Adjust the output formatting based on the structure of your data
            // $output .= $item . "\n"; // Example for a simple array of strings
            // For associative arrays: $output .= $item['key'] . "\n";
            // $output .= $item['key'] . "\n";
            print_r($item);
        }
    
        // Directly echo the output
        // echo $output;
    }

}


