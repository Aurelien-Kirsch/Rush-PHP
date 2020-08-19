<?PHP 

class connectDB
{
    private static $instance;

    private function __construct(){}

    public static function getInstance()
    {
        if(empty(self::$instance))
        {
            $info = array(
                    "host" => "localhost",
                    "db_name" => "mvc",
                    "name" => "root",
                    "port" => "3306",
                    "password" => "Aur_006_$");

            try
            {
                self::$instance = new PDO("mysql:host=".$info["host"].";dbname=".$info["db_name"].";port=".$info["port"],$info["name"],$info["password"]);

            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        return self::$instance;
    }
}
?>