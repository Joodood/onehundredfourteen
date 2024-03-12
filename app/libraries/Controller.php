<?php

// class Controller {
//     public function model($model) {
//         if(file_exists(require_once "../models/" . $model . ".php")) {
//             echo "model exists";
//         }
//     }

// }

class Controller {
    public function model($model) {
        require_once "../app/models/" . $model . ".php";
        return new $model();
    }

    public function view($view, $data = []) {
        if(file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die("View Does Not Exist");
        }
    }
    public function redirect($url) {
        header("Location: " . $url);
        exit();
    }
}

//if there not ont he omepage 
//becasue the homepage is the only place where
//the fielder is