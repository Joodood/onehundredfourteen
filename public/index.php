<?php 

require_once __DIR__ . '/../app/libraries/Core.php';
require_once __DIR__ . '/../app/configs/config.php';
// require __DIR__ . '/../app/controllers/SearchController.php';
require_once __DIR__ . '/../app/libraries/Database.php';

require_once   '../app/libraries/Controller.php';


require_once   '../app/controllers/SearchController.php';

require_once   '../app/controllers/SearchControllerforRecs.php';

require_once   '../app/controllers/SearchControllerforRecsatInst.php';


// require_once __DIR__ . '/../app/controllers/SearchControllerforRecs.php';
// app/controllers/SearchControllerforRecs.php

$database = new Database();

$coreController = new Core();

require_once __DIR__ . '/../app/controllers/SearchController.php';
$searchController = new SearchController($database);
require_once __DIR__ . '/../app/controllers/SearchControllerforRecs.php';
$searchControllerforRecs = new SearchControllerforRecs($database);
require_once __DIR__ . '/../app/controllers/SearchControllerforRecsatInst.php';
$searchControllerforRecsatInst = new SearchControllerforRecsatInst($database);


// Check if it's an AJAX request
if ($coreController->isAjaxRequest()) {
    // echo $searchController->search();
    // echo $searchController->search();

    // echo $searchController->searchrec();

    //sanitize later
    if(isset($_GET['url'])) {
        $url = $_GET['url'];

        switch ($url) {
            case 'search':
                echo $searchController->search();
                break;
            case 'searchrec':
                echo $searchControllerforRecs->search();
                break;
            case 'recsatinstitutions':
                echo $searchControllerforRecsatInst->search();
                break;
        }

//            if($url == 'search') {
//                echo $searchController->search();
//            } elseif ($url == 'searchrec') {
//                echo $searchControllerforRecs->search();
//            } elseif ($url == 'recsatinstitutions') {
//                echo $searchControllerforRecsatInst->search();
//            }
    }

} else {
    // For non-AJAX requests, handle the default behavior

if(isset($_GET['url'])) {

    $url = $_GET['url'];

    switch ($url) {
        case 'search':
            $searchController->search();
            break;
        // case 'searchrec':
        //     $searchController->searchrec();
        case 'searchrec':
            $searchControllerforRecs->search();
            break;
        case 'recsatinstitutions':
            $searchControllerforRecsatInst->search();
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
