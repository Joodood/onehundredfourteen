<?php


class Homepage {
    public function __construct() {
        echo 'Homepage loaded';
        echo $_GET['url'];
        echo "<br>";
        echo $_SERVER['REQUEST_METHOD'];
        echo "<br>";
        echo $_SERVER['REQUEST_URI'];
        // phpinfo();
    }

    public function index() {
        echo "this is index";
        echo $params;
    }

    // public function about() {
    //     // echo "<br>";
    //     echo "this is about";
    //     // echo "<br>";
    //     // print_r($theparams);
    // }
}









