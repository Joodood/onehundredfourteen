<?php


class Receptionists extends Controller {
    public function __construct() {
        // echo $_GET['url'];
        $this->receptionistModel = $this->model("Receptionist");
    }

    public function index() {

        $this->view('receptionists/receptionistview', ['title'=>'welcome']);

    }


    public function about() {
       
 
 
    }

}

