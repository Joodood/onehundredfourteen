<?php

require_once "../app/helpers/url_helper.php";


class SearchController extends Controller {
    private $database;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    public function search() {

        // echo "search me";
        // Access $this->database to interact with the database
        $input = isset($_POST['input']) ? $_POST['input'] : '';

        // Perform database query based on the input
        $result = $this->database->search($input);

        
        // $this->view('institutions/institutionview', ['result'=>$result]);
        
        // Send the result as JSON to the client
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    public function index() {
        $this->view('homepages/homepageview', ['title'=>'welcome']);

    }
}


