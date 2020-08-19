<?PHP 

    class Request  {

        private $method = "GET";
        private $controller = "";
        private $action = "";
        private $params = "";
        private $tab = [];

        public function __construct()
        {
            $this->controller = $_GET["controller"]; 
            $this->action = $_GET["action"];

            array_shift($_GET);
            array_shift($_GET);

            $this->params =  $_GET;

            if (!empty($_POST) ) {

                $this->method = "POST";
            }
        }

        public function getRequest () 
        {
            $this->tab[]= $this->method;
            $this->tab[]= $this->controller;
            $this->tab[] = $this->action;
            $this->tab[] = $this->params;

            return $this->tab;
        }
    }
