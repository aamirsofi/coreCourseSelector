<?php
class Database
{
    protected $conn = null; //protcted $conn variable that will hold the PDO instance
    public static function open()
    {
        //to open database connection
        try {
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'course_selector';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];

            $conn = new PDO(
                "mysql:host=$servername;dbname=$dbname",
                $username,
                $password,
                $options
            ); //Creating a PDO instance
            return $conn;
        } catch (PDOexception $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
    }
    public function Close()
    {
        //function to close database connection
        $conn = null;
        echo 'Connection Closed';
    }
}

?>
