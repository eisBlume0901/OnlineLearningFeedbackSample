<?php

class DBConnection
{
    private string $username;
    private string $password;
    private string $dbname;
    private PDO $connection; // Counterpart in Java is Connection

    public function __construct() {
        $this->username = "root";
        $this->password = "";
        $this->dbname = "online_learning_feedback_db";
    }

    public function getConnection() {
        try {

            $this->connection = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            /*
             * ATTR_ERRMODE is an attribute that tells PDO to throw exceptions when errors occur.
             * ERRMODE_EXCEPTION is a constant that tells PDO to throw exceptions when errors occur.
             * It means that if there is an error, it will stop the script and output the error message.
             */
//            echo "Connected to " . $this->dbname . " successfully"; // Use this for debugging
            return $this->connection;
        } catch (PDOException $e) {
            echo "Failed to connect to the  " . $this->dbname . " successfully." . "<br>" . $e->getMessage();
        }
    }

    public function closeConnection() {
//        echo "Closing connection to " . $this->dbname . " successfully."; // Use this for debugging
        $this->connection = null;
    }
}