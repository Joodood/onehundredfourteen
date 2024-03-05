<?php


require_once "../app/helpers/url_helper.php";

class SearchControllerforRecsatInst extends Controller {
    private $database;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    public function index() {
        // Method body can be empty if it's not used
    }

    public function search() {

        error_log('Search method called with input: ' . $_POST['input']); // Writes to the PHP error log
        echo "Search method received input: " . htmlspecialchars($_POST['input']); // Echoes back to the AJAX call for debugging

        // Get 'input' from POST data, default to an empty string if not set
        $input = isset($_POST['input']) ? $_POST['input'] : '';

        $result = $this->database->same_as_se($input);

        if ($result === false) {
            $result = []; // Ensure $result is an array for the foreach loop
            // Optionally, add error logging or user feedback here
        }

        // Process and output the result
        // Adjust according to the structure of your data
//        foreach ($result as $item) {
//
//            print_r($item);
//            echo $item;
//
//        }

        foreach ($result as $item) {
            if (is_array($item)) {
                // If $item is an array, iterate through its values or access its keys directly
                echo htmlspecialchars($item['name']) . "<br>"; // Adjust the key as per your data structure
            } elseif (is_object($item)) {
                // If $item is an object, access its properties
                echo htmlspecialchars($item->name) . "<br>"; // Adjust the property as per your data structure
            }
        }


    }

}





//
//require_once "../app/helpers/url_helper.php";
//
//// require_once "../app/libraries/Database.php";
//
//class SearchControllerforRecsatInst extends Controller {
//    private $database;
//
//    public function __construct(Database $database) {
//        $this->database = $database;
//    }
//
//    public function index() {
//
//    }
//
//    public function search() {
//        //recepts' name
//        $input = isset($_POST['input']) ? $_POST['input'] : '';
//
////        $institution_id = isset($_POST['institution_id']) ? $_POST['institution_id'] : '';
//
//        // Perform database query based on the input
////        $result = $this->database->recsatinst($input, $institution_id);
//        $result = $this->database->se($input);
//
////        $int_got_by_id = $this->database->get_inst_by_id($institution_id);
//
//
//
//        if ($result === false) {
//            // If the result is false, handle the error or simply set $result to an empty array
//            // so the foreach loop below is skipped.
//            $result = [];
//            // Optionally, add error logging or user feedback here.
//        }
//
//
//        // $output = '';
//        foreach ($result as $item) {
//            // Adjust the output formatting based on the structure of your data
//            // $output .= $item . "\n"; // Example for a simple array of strings
//            // For associative arrays: $output .= $item['key'] . "\n";
//            // $output .= $item['key'] . "\n";
//            print_r($item);
//        }
//
//        // Directly echo the output
//        // echo $output;
//    }
//
//}


