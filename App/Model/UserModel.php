<?PHP 
    
    // namespace Model;
    require_once($_SERVER["DOCUMENT_ROOT"] . "/../App/Model/connectDB.php");

    class UserModel {

        private $name = "";
        private $id = "";
        private $email = "";
        private $password = "";

// ------------------------------------------------------------------------------
// Get informations from a user 

        public function getUser($id) 
        {
            try {
    
                $user = connectDB::getInstance();
                $infos = $user->prepare("SELECT * FROM users WHERE id = ?");
                $infos->bindParam(1, $id);
                $infos->execute();
                $display = $infos->fetchAll(PDO::FETCH_ASSOC);
            }
            catch (PDOException $e) {

                echo $e->getMessage();
            }

            $this->$name = $display["name"];
            $this->$email = $display["email"];
            $this->$id = $display["id"];
            $this->$password = $display["password"];

        }

        public function validate()
        {
            $err = '';

            if (empty($this->username) || strlen($this->username) <= 3) {
            $err = $err . "Invalid 'username' field. Must have more than 3 characters.<br>";
            }
            if (empty($this->email) || preg_match('#^[a-zA-Z0-9]+@[a-zA-Z]{2,}\.[a-z]{2,4}$#', $this->email) != 1) {
            $err = $err . "Invalid 'email' field. Wrong format.<br>";
            }
            if (empty($this->password)) {
            $err = $err . "Invalid 'password' field. Can't be blank.<br>";
            }

            if (!empty($err)) {

                throw new Exception($err);
            }

            return $err;
        }

//Create a user

        public function setUser($name, $email, $password) {

            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            
            try {

              $this->validate();
            }
            catch(Exception $e) {

                $error = $e->getMessage;
            }

                if ( empty($error) ) {

                    $hash = password_hash($password, PASSWORD_DEFAULT);

                    try {

                        $user = connectDB::getInstance();
                        $infos = $user->prepare("INSERT INTO users (name, email, password) VALUES ( ?, ?, ? ) ");
                        $infos->bindParam(1, $name);
                        $infos->bindPram(2, $email);
                        $infos->bindPram(3, $password);
                        $infos->execute();
                        $state = "success";
                    }
                    
                    catch (PDOException $e) {
        
                        $state = $e->getMessage();
                    }
                    return $state;
                }
                else {

                    return $error;
                }
        }

// Delete a user

        public function deleteUser($email) {
            
            try {

                $user = connectDB::getInstance();
                $infos = $user->prepare("DELETE FROM users WHERE email = ? ");
                $infos->bindParam(1, $email);
                $infos->execute();
                $state = "success";
            }

            catch (PDOException $e) {

                $state = $e->getMessage();
            }

            return $state;
        }

// --------------------------------------------------------------------------------------
// Get the username 

        public function getUsername() 
        {
            return $this->$name;
        }

        public function setUsername($newName) {

            try {

                $user = connectDB::getInstance();
                $infos = $user->prepare("UPDATE users SET name = ? ");
                $infos->bindParam(1, $newName);
                $infos->execute();
            }
            catch (PDOException $e) {

                echo $e->getMessage();
            }
        }
// ----------------------------------------------------------------------------------------
// Get the email 

        public function getEmail() 
        {
            return $this->$email;
        }
        
        public function setEmail($email) {

            try {

                $user = connectDB::getInstance();
                $infos = $user->prepare("UPDATE users SET email = ?");
                $infos->bindParam(1, $email);
                $infos->execute();
            }
            catch (PDOException $e) {

                echo $e->getMessage();
            }
        }
// -----------------------------------------------------------------------------------------
// Get the password 

        public function getPassword() 
        {
           return $this->$password;
        }
        
        public function setPassword($password) {

            try {

                $user = connectDB::getInstance();
                $infos = $user->prepare("UPDATE users SET password = ?");
                $infos->bindParam(1, $password);
                $infos->execute();
            }
            catch (PDOException $e) {

                echo $e->getMessage();
            }
        }

        public function checkLogin($email, $password)
        {
            if ( $this->email == $email && $this->password == password_hash($password,PASSWORD_DEFAULT) ) {

                return true;
            }
            else {

                return false;
            }
        }

    }
?>