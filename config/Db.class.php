<?php 
class Db {
    private $hostname = 'localhost';
    private $password = '';
    private $username = 'root';
    private $databaseName = 'registrydb';
    private $connection;

    public function __construct() {
        $this->connection = $this->getConnection();
    }

    // Establish a connection to the database
    public function getConnection() {
        if ($this->connection === null) {
            $conn = new mysqli($this->hostname, $this->username, $this->password, $this->databaseName);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);  // More descriptive error message
            }
            $this->connection = $conn;
        }
        return $this->connection;
    }

    // Close the database connection
    public function closeConnection() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}
?>
