<?PHP 
    class Routes {

        private static $tabRoutes = ["GET" => [
                                                array("Article","Display"),
                                                array("Article","Create"),
                                                array("Article","Search"),
                                                array("Login", "Display"),
                                                array("User", "Display"),
                                                array("Admin", "Display"),
                                                array("Admin", "Create"),
                                                array("Admin", "ViewUser"),
                                                array("User", "getInfos"),
                                                ],

                                    "POST" => [
                                                array("Article","Modify"),
                                                array("Article","Create"),
                                                array("Article","Search"),
                                                array("Article","Display"),
                                                array("Article","Comment"),
                                                array("Login", "Connect"),
                                                array("Login", "register"),
                                                array("Admin", "Connect"),
                                                array("Admin", "Create"),
                                                array("Admin", "Delete")

                                                ],
        ];

        public function __construct() 
        { 
        }

        public function getGet()
        {
            return self::$tabRoutes["GET"];
        }

        public function getPost()
        {
            return self::$tabRoutes["POST"];
        }
    }
?>