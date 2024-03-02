<?php


class Receptionists extends Controller {
    public function __construct() {
        // echo $_GET['url'];
        $this->receptionistModel = $this->model("Receptionist");
    }

    public function index() {
        if(isset($_POST['input'])) {
            $input = $_POST['input'];
            // $this->institutionModel->query("SELECT * FROM institutions WHERE institution_name = :input");
            $stmt = $this->receptionistModel->query("SELECT * FROM receptionists WHERE receptionist_name = :input");
        // $this->institutionModel->bind(':input', $input, PDO::PARAM_STR);
       
            $stmt->bind(':input', $input, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            header('Content-Type: text/plain');
            if ($result) {
                print_r($result);
                // $this->view('institutions/institutionview', $result);
                foreach ($result as $key => $value) {
                    echo "{$key}: {$value}\n";
                }
            } else {
                echo "No results found";
            }
    
        } else {
            $this->view('receptionists/receptionistview');

            // header('HTTP/1.1 400 Bad Request');
            // Echo the error in plain text instead of json
            // echo "Error: Input not provided";
            
            // $this->view('institutions/institutionview');
        }

        // $this->view('receptionists/receptionistview', ['title'=>'welcome']);

    }


    public function about() {
       
 
 
    }

}

