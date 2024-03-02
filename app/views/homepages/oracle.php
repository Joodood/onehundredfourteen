
<?php

class Oracle {
    protected $sidebar;
    protected $header;
    protected $content;


    function sidebar() {
        require_once "../inc/sidebar.php";
    }

    function header() {
        require_once "../inc/searchbarheader.php";
    }
    function content() {
        require_once "../app/inc/content.php";
    }

    function all() {
        require_once "../inc/sidebar.php";
        require_once "../inc/searchbarheader.php";
        

    }
}


?>