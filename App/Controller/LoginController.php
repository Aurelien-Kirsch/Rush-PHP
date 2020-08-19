<?PHP 

// namespace Controller;

require_once($_SERVER["DOCUMENT_ROOT"] . "/../App/Model/UserModel.php");

class LoginController {

    private $user;
    private $params;

    public function __construct($action, $params = NULL) 
    {
        $this->user = new UserModel();
        $this->params = $params ;

        switch ($action) {

            case "Display":

                $this->Display();
            break;

            case "Connect":

                $this->Connect();
                break;

            case "Logout":

                $this->Logout();
                break;
            
            case "register":

                $this->register();
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
            include_once($_SERVER["DOCUMENT_ROOT"] . "/../App/View/LoginView.php");
            // include_once($_SERVER["DOCUMENT_ROOT"] . "/../App/View/footer.php");

    }

    public function Connect()
    {
        $obj = $this->user->check_login($_POST["email"],$_POST["password"]);
        if ($obj !=false)
        {
            $_SESSION["groups"] = $obj->getGroups();
            $_SESSION["name"] = $obj->getUsername();
            header("Location: index.php?ctrl=Article&act=Display");
        }
        else {
            $error = "Wrong email or password";
            include($_SERVER["DOCUMENT_ROOT"] . "/../App/View/header.php");
            include($_SERVER["DOCUMENT_ROOT"] . "/../App/View/LoginView.php");
            include($_SERVER["DOCUMENT_ROOT"] . "/../App/View/footer.php");
        }
       
    } 

    public function Logout()
    {
        session_destroy();
        
        include($_SERVER["DOCUMENT_ROOT"] . "/../App/View/header.php");
        include($_SERVER["DOCUMENT_ROOT"] . "/../App/View/LoginView.php");
        include($_SERVER["DOCUMENT_ROOT"] . "/../App/View/footer.php");
    } 

    public function register($name=null, $email=null, $password=null)
    {   
        include($_SERVER["DOCUMENT_ROOT"] . "/../App/View/header.php");
        include($_SERVER["DOCUMENT_ROOT"] . "/../App/View/registerView.php");
        include($_SERVER["DOCUMENT_ROOT"] . "/../App/View/footer.php");

        if ( isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) ) {

            $this->user->setUser($_POST["name"], $_POST["email"], $_POST["password"]);
            header("Location: index.php?controller=Login&action=Display");
        }
        else {

            $error = "you must fill every field";
            return $error;
        }
        
    }
}
?>