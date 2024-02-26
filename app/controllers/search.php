<?php


class search extends Controller {
    public function __construct() {
        // echo 'Homepages loaded';
        // echo "<br>"; 
        // echo $_GET['url'];
        // echo "<br>";
        // echo $_SERVER['REQUEST_METHOD'];
        // echo "<br>";
        // echo $_SERVER['REQUEST_URI'];
        // echo "<br>";
        // echo phpinfo();
        // phpinfo();

        $this->institutionModel = $this->model('Institution');
        // $this-> = $this->model('Listing');
    }

    

    public function index() {
        
        if(isset($_POST['input'])) {
            $input = $_POST['input'];
            // $this->institutionModel->query("SELECT * FROM institutions WHERE institution_name = :input");
        $stmt = $this->institutionModel->query("SELECT * FROM institutions WHERE institution_name = :input");
        // $this->institutionModel->bind(':input', $input, PDO::PARAM_STR);
       
        $stmt->bind(':input', $input, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        header('Content-type: application/json');
        echo json_encode($result);

        } else {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(['error' => 'Input not provided']);

        }

        // echo "this is index";
        // echo $params;

        // echo $id;
//, ['title' => 'Welcome']
        // $this->view('homepages/homepageview');


        // $this->view('homepages/homepageview', ['title'=>'welcome']);

        // $this->view('')
    }


    public function about() {
       
        // echo "this is about";
        // $this->

        // echo $params;

 
    }

    // public function about() {
    //     // echo "<br>";
    //     echo "this is about";
    //     // echo "<br>";
    //     // print_r($theparams);
    // }
}


