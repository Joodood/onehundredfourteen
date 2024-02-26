<?php



class Core {
    protected $currentController = "search";
    protected $currentMethod = "index";
    protected $params = [];

    public function __construct() {

    }

    public function handledefault() {
        $url = $this->getUrl();
        if(isset($url[0])) {

            if(file_exists("../app/controllers/" . ucwords($url[0]) . ".php")) {
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }
        }
        require_once "../app/controllers/" . $this->currentController . ".php";

        $this->currentController = new $this->currentController;

        if(isset($url[1])) {
            if(method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }
        $this->params = $url ? array_values($url) :[];

        call_user_func([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl() {
        if(isset($_GET['url'])) {
            $url = $_GET['url'];
//            print_r($url);
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }

    public function isAjaxRequest() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }

}





?>