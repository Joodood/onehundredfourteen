<?php

class Core {
    protected $currentController = "Homepage";
    protected $currentMethod = "index";
    protected $params = [];


public function __construct() {
    // print_r($this->getUrl());

    $url = $this->getUrl();

    //Look in controllers for first index, value because everything gets routed into that, so we should route everything like its in index.php
    if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
        //If exists, set as controller 
        $this->currentController = ucwords($url[0]);
        // Unset 0 Index
        unset($url[0]);
        
    }
    //Require the controller
    require_once '../app/controllers/' . $this->currentController . '.php';

    //Instantiate the controller class
    $this->currentController = new $this->currentController;

    
    // what it will look like: $pages = new Pages
    
    //check for second part of url 
    // if(isset($url[1])) {
    //     //Check to see if method exists
    //     if(method_exists($this->currentController, $url[1])) {
    //         $this->currentMethod = $url[1];
    //         //unset 1 index
    //         unset($url[1]);
    //     }
    // }

    //its a prop not a method, so no parenthesis
    // echo $this->currentMethod;

    //get any values left over, Get params
    //if there are paremeters they will get added, if not, then it'll just stay an empty array


    // $this->params = $url ? array_values($url) : [];
    

    // Call a callback with array of params
    //the second parameter after the brackets will be this params
    //this should load the method and we can pass in the parameters
    
    // error_clear_last();


    call_user_func_array([$this->currentController, $this->currentMethod], 
    $this->params);

    // if ($result == false && error_get_last()) {
    //     echo 'failed to call';
    // }
}

public function getUrl() {
    if(isset($_GET['url'])) {
            //get rid of end / if there is one
        $url = rtrim($_GET['url'], '/');
        
        //should not have any characters that a url should not have 
        $url = filter_var($url, FILTER_SANITIZE_URL);

        //array of post/edit/1

        $url = explode('/', $url);

        return $url;

        }
    }
}

