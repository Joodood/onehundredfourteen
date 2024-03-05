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

//        $count = count($result);
//        echo $count;
//        echo "<br>";
        // $output = '';
        foreach ($result as $item) {
//            echo $item['institution_name'] . ", ";
//            echo "<br>";

//            echo '<a href="' . URLROOT . '/Findreceptsatinstitution/index/' . $item['institution_id'] . '" style="display: block;">' . htmlspecialchars($item['institution_name']) . ' ' . '<span>' . htmlspecialchars($item['institution_city']) . ', ' . htmlspecialchars($item['institution_state']) . '</span><br>'
// . '</a>';

//            echo '<a href="' . URLROOT . '/Findreceptsatinstitution/index/' . $item['institution_id'] . '" style="display: block;">' . htmlspecialchars($item['institution_name']) . '</a>';
//            echo '<span>' . htmlspecialchars($item['institution_city']) . ', ' . htmlspecialchars($item['institution_state']) . '</span><br>';


            echo '<a href="' . URLROOT . '/Institutions/about/' . $item['institution_id'] . '" style="display: block; text-decoration: none; color: black;">' .
                htmlspecialchars($item['institution_name']) . ' - ' .
                htmlspecialchars($item['institution_city']) . ', ' .
                htmlspecialchars($item['institution_state']) .
                '</a><br>';

            // Display a "Go to Institution Page" link
//            echo '<a href="' . URLROOT . '/Institutions/about/' . $item['institution_id'] . '">Go to Institution page</a><br><br>';


//            echo '<a href="' . URLROOT . '/Institutions/about/' . $item['institution_id'] . '">' . htmlspecialchars($item['institution_name']) . '</a><br>';

            /*            echo "<a href = <?php echo URLROOT; ?>/Institutions/about/";*/
            // print_r($item);
//             print_r($item);
//             echo '<a href = "#">$item</a>';
//            var_dump($item);
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


