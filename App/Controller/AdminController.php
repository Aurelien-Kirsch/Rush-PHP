<?PHP 

// namespace Controller;

require_once($_SERVER["DOCUMENT_ROOT"] . "/../App/Model/UserModel.php");

class AdminController {

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

            case "Create":

                $this->CreateUser($this->params);
            break;

            case "Delete":

                $this->RemoveUser($this->params);
            break;

            case "ViewUser":

                $this->getInfos($this->params);
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
            include_once($_SERVER["DOCUMENT_ROOT"] . "/../App/View/AdminView.php");
            include_once($_SERVER["DOCUMENT_ROOT"] . "/../App/Viewfooter.php");

    }

    public function CreateUser($name, $email, $password)
    {
        $this->user->setUser($name, $email, $password);
        
    }

    public function RemoveUser($email)
    {
        $this->user->deleteUser($email);
    }

    
}
?>