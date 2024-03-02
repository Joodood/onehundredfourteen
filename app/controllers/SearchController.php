<?php

require_once "../app/helpers/url_helper.php";


class SearchController extends Controller {
    private $database;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    public function index() {
        
    }

    public function search() {
        $input = isset($_POST['input']) ? $_POST['input'] : '';
    
        // Perform database query based on the input
        $result = $this->database->search($input);
    
        if ($result === false) {
            // echo "No results found."; // Provide a simple message or keep an empty response
            // return; // Exit the method
            $result = [];
        }
    
        // $output = '';
        foreach ($result as $item) {
            // print_r($item);
            // print_r($item);
            var_dump($item);
            // $this->view("institutions/institutionview", $item);
            // Example for a simple array of strings
            // Adjust this line based on your actual data structure
            // $output .= '<div>' . htmlspecialchars($item) . '</div>'; // Ensure HTML entities are encoded
            // For associative arrays, you might use $output .= '<div>' . htmlspecialchars($item['key']) . '</div>';

        }
    
        // Directly echo the HTML output
        // echo $output;
    }
    
}


