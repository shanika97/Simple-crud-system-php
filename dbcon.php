

<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "php_dev_shanika");


//use OOP standards.
class dbcon {
    public $connection;

    public function __construct() {
        $this->connection = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        } else {
            // echo "Successfully connected...";
        }
    }
}

$db = new dbcon();
?>


    



