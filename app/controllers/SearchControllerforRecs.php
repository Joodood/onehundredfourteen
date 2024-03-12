<style>
.link-style {
    display: block;
    text-decoration: none;
    color: black;
}

</style>

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
    
        //theres only one name, but can be a part of many different insitutions
        // Perform database query based on the input
        $result = $this->database->se($input);
        

        if ($result === false) {
            // If the result is false, handle the error or simply set $result to an empty array
            // so the foreach loop below is skipped.
            $result = [];
            // Optionally, add error logging or user feedback here.
        }

        //fetch institution_name based on institution_id in receptionists

        

        // $instName = $this->database->inst_name_from_inst_id_in_recs($result['institution_id']);
        
        // print_r($instName);

        

        
        // $output = '';

        // foreach ($result as $item) {
        //     // Adjust the output formatting based on the structure of your data
        //     // $output .= $item . "\n"; // Example for a simple array of strings
        //     // For associative arrays: $output .= $item['key'] . "\n";
        //     // $output .= $item['key'] . "\n";
        //     // print_r($item);
        //     //worked
        //     // echo "<a href='" . URLROOT . "/Receptionists/about/" . $item['receptionist_id'] . "'>" . htmlspecialchars($item['receptionist_name']) . "</a><br>";
        //     echo "<a href='" . URLROOT . "/Receptionists/about/" . $item['receptionist_id'] . "' class='link-style'>" .
        //     htmlspecialchars($item['receptionist_name']) . 
        //     // " - " . htmlspecialchars($item['receptionist_city']) . ", " . htmlspecialchars($item['receptionist_state']) .
        //     "</a><br>";
        //     // echo '<a href="' . URLROOT . '/Receptionists/about/' . $item['receptionist_id'] . '" style="display: block; text-decoration: none; color: black;">' .
        //     // htmlspecialchars($item['receptionist_name']) . '</a><br>';

        // }

        //no style
        // foreach ($result as $item) {
        //     echo "<a href='" . URLROOT . "/Receptionists/about/" . $item['receptionist_id'] . "' class='link-style'>" .
        //     htmlspecialchars($item['receptionist_name']) . 
        //     "</a><br>" .
        //     htmlspecialchars($item['institution_name']) . " - " .
        //     htmlspecialchars($item['institution_city']) . ", " . 
        //     htmlspecialchars($item['institution_state']) . "<br>";
        // }
        
        foreach ($result as $item) {
            echo "<a href='" . URLROOT . "/Receptionists/about/" . $item['receptionist_id'] . "' class='link-style'>" .
            htmlspecialchars($item['receptionist_name']) .
            "<span class='institution-details'>" .
            " - " . htmlspecialchars($item['institution_name']) . ", " .
            htmlspecialchars($item['institution_city']) . ", " . 
            htmlspecialchars($item['institution_state']) .
            "</span></a><br>";
        }
        

        // foreach ($result as $item) {
        //     echo "<a href='" . URLROOT . "/Receptionists/about/" . $item['receptionist_id'] . "' class='link-style'>" .
        //     htmlspecialchars($item['receptionist_name']) . " - " .
        //     htmlspecialchars($item['institution_name']) .
        //     "</a><br>" .
        //     htmlspecialchars($item['city']) . ", " . htmlspecialchars($item['state']) . "<br>";
        // }
    
    }

}


