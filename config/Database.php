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
        }
    }
?>