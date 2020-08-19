<?PHP 

    // namespace Controller;

    require_once($_SERVER["DOCUMENT_ROOT"] . "/../App/Model/UserModel.php");

    class UserController {

        private $user;
        private $params;

        public function __construct($action, $params = NULL) 
        {
            $this->user = new UserModel();
            $this->params = $params ;

            switch ($action){

                case "Display":

                    $this->Display();
                break;

                case "Infos":

                    $this->getInfos();
                break;

            }

        }

        public function getInfos($id) 
        {
            $this->user->getUser($id);
            $Username = $this->user->getUsername();
            $Email = $this->$user->getEmail();
        }

        public function Display() 
        {
                include_once($_SERVER["DOCUMENT_ROOT"] . "/../App/View/header.php");
                include_once($_SERVER["DOCUMENT_ROOT"] . "/../App/View/UserView.php");
                include_once($_SERVER["DOCUMENT_ROOT"] . "/../App/View/footer.php");

        }
    }
?>

