<?php 
    class Database {

        //Database Parameters
        private $host = 'localhost';
        private $db_name = 'php-api';
        private $username = 'root';
        private $password = 'admin;'
        private $conn;

        // Database Connect
        public function connetc()
        {
            $this->conn = null;

            try {
                $this->conn = new PDO('mysql:host='.$this->host. ';dbname=' .$this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(PDOException $e){
                echo 'Connection Error;' . $e->getMessage();
            }

            return $this->conn;
        }
    }
?>