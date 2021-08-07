<?php
class Database{
// private $host ='localhost';
// private $db_name='bethelproperties';
// private $username ='root';
// private $password='';

private $host ='us-cdbr-east-04.cleardb.com';
private $db_name='heroku_d34a51b7a506f6f';
private $username ='b3ed1a6aed8b4b';
private $password='4689cab3';
private $conn;


public function connect()
{
    $this->conn = null;
    try {
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection Error: " . $e->getMessage();
    }
    return $this->conn;
}


}
?>