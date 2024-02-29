<?php 

require_once __DIR__ . '/../app/libraries/Core.php';
require_once __DIR__ . '/../app/configs/config.php';
// require __DIR__ . '/../app/controllers/SearchController.php';
require_once __DIR__ . '/../app/libraries/Database.php';

require_once   '../app/libraries/Controller.php';


require_once   '../app/controllers/SearchController.php';

require_once   '../app/controllers/SearchControllerforRecs.php';


$database = new Database();

$coreController = new Core();
$searchController = new SearchController($database);

// $searchControllerforRecs = new SearchControllerforRecs($database);


// Check if it's an AJAX request
if ($coreController->isAjaxRequest()) {
    echo $searchController->search();
    // echo $searchController->search();

    // echo $searchController->searchrec();

    //sanitize later
    // if(isset($_GET['url'])) {
    //     $url = $_GET['url'];
    //         if($url == 'search') {
    //             echo $searchController->search();
    //         } elseif ($url == 'searchrec') {
    //             echo $searchControllerforRecs->search();
    //         }
    // }
    

} else {





// if ($coreController->isAjaxRequest()) { 
//     $url = $_GET['url'];
//     switch ($url) {
//         case 'search':
//             $searchController->search();
//             break;
//         case 'searchrec':
//             $searchController->searchrec();
//             break;
//     }
//     echo $searchController->search();
// } else {

    

    // For non-AJAX requests, handle the default behavior

if(isset($_GET['url'])) {

    $url = $_GET['url'];

    switch ($url) {
        case 'search':
            $searchController->search();
            break;
        case 'searchrec':
            $searchController->searchrec();
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


