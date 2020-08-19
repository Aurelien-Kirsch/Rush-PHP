<?PHP 

    require_once($_SERVER["DOCUMENT_ROOT"] . "/../routes.php");

    class Router {

        private $controller;
        private $action;
        private $params;
       
        private static $instance;

        private function __construct() 
        {
        }

        public static function getInstance()
        {
            if(is_null(self::$instance)) {

                self::$instance = new Router();
            }

            return self::$instance;
        }

        public function verifyRoutes($request)
        {
            if ($request[0] == "GET") {

                $routes = Routes::getGet();

            } 

            else {

                $routes = Routes::getPost();
            }

            foreach ($routes as $route) {

                if ($route == array($request[1],$request[2]) ) {

                    $this->controller = $request[1];
                    $this->action = $request[2];
                    $this->params = $request[3];

                }
            }

            if ($this->controller == null) {
               
                include($_SERVER["DOCUMENT_ROOT"] . "/../App/View/Error404.php");
            } else {
               
                $classname = $this->controller."Controller";
                include($_SERVER["DOCUMENT_ROOT"] . "/../App/Controller/".$classname.".php");
                new $classname($this->action,$this->params);
            }
        }


        
    }

