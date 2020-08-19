<?PHP 
    session_start();
    require_once($_SERVER["DOCUMENT_ROOT"] . "/../router.php");
    require_once($_SERVER["DOCUMENT_ROOT"] . "/../request.php");

     $r = new Request();
     $tableau = $r->getRequest();
     $router = Router::getInstance();
     $router->verifyRoutes($tableau);
?>
