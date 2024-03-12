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


    public function show() {
        // input_receptionist_name
    }

//about are the Receptionist Reviews, and can be the left comments in Hathway Bros sight next to ontop of under song lyrics or a wave line
    public function about($id) {
        $id = $id[0];

        $returned_receptionist = $this->receptionistModel->getReceptionistbyId($id);

        $all_receptionists_reviews_results = $this->receptionistModel->if_receptionist_id_is_in_record_of_reception_reviews($id);

        $data = [$returned_receptionist, $all_receptionists_reviews_results];

        // print_r($data);

        if($all_receptionists_reviews_results) {
            $this->view("receptionists/about", $data);
        } else {
            $this->view("receptionists/about");
        }


    }




}

