<?php


class Homepages extends Controller {
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

        // echo "this is index";
        // echo $params;

        // echo $id;
//, ['title' => 'Welcome']
        $this->view('homepages/homepageview');


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









