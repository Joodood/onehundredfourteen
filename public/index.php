<?php 

require_once __DIR__ . '/../app/libraries/Core.php';
require_once __DIR__ . '/../app/configs/config.php';
// require __DIR__ . '/../app/controllers/SearchController.php';
require_once __DIR__ . '/../app/libraries/Database.php';

require_once   '../app/libraries/Controller.php';


require_once   '../app/controllers/SearchController.php';


$database = new Database();

$coreController = new Core();
$searchController = new SearchController($database);


// Check if it's an AJAX request
if ($coreController->isAjaxRequest()) {
    $searchController->search();
} else {

    // For non-AJAX requests, handle the default behavior

if(isset($_GET['url'])) {

    $url = $_GET['url'];

    switch ($url) {
        case 'search':
            $searchController->search();
            break;
        default:
            $coreController->handleDefault();
            break;
    }
} else {
    // no 'url' parameter provided, route to th edefault behavior in Core
    $coreController->handleDefault();
}

}














// require_once "../app/bootstrap.php";


// //Init core library

// $init = new Core;


