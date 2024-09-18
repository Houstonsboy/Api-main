<?php
class dbConnection {
    private $connection;

    private $db_type;
    private $db_host;
    private $db_port;
    private $db_user;
    private $db_pass;
    private $db_name;

    // Constructor that initializes the database parameters and creates the connection
    public function __construct($db_type, $db_host, $db_port, $db_user, $db_pass, $db_name) {
        $this->db_type = $db_type;
        $this->db_host = $db_host;
        $this->db_port = $db_port;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
        
        // Call the connection function inside the constructor
        $this->connection($db_type, $db_host, $db_port, $db_user, $db_pass, $db_name);
    }

    // Method to establish the connection
    public function connection($db_type, $db_host, $db_port, $db_user, $db_pass, $db_name) {
        switch ($db_type) {
            case 'PDO':
                if ($db_port != null) {
                    $db_host .= ":" . $db_port;
                }
                try {
                    // Create the PDO connection
                    $this->connection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
                    // Set PDO error mode to exception
                    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    echo "Connected successfully :-)";
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
                break;

            case 'MySQLi':
                if ($db_port != null) {
                    $db_host .= ":" . $db_port;
                }
                // Create MySQLi connection
                $this->connection = new mysqli($db_host, $db_user, $db_pass, $db_name);
                // Check connection
                if ($this->connection->connect_error) {
                    echo "Connection failed: " . $this->connection->connect_error;
                } else {
                    echo "Connected successfully";
                }
                break;
        }
    }

    // Getter method to access the connection outside of the class
    public function getConnection() {
        return $this->connection;
    }
}
