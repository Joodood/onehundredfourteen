<?php


class Findreceptsatinstitution extends Controller {

    public function __construct() {

        $this->newModel = $this->model('Institution');
    }

    public function index($id) {
        $id = $id[0];
        $returned_institution = $this->newModel->getInstitutionbyId($id);

        //if name matches and id == id passed in

        $this->view('findreceptsatinstitutions/findreceptsatinstitutionsview', $returned_institution);

    }





}