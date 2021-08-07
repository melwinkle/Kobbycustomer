<?php
class pass{
    private $conn;
    private $table ='password-reset';

    public $email;

    public function __construct($db){
        $this->conn =$db;
    }

    public function deletepass(){
        $query ="DELETE FROM password_reset WHERE Email =:e";
        $stmt =$this->conn->prepare($query);
        $stmt->bindParam('e',$this->email);
        $stmt->execute();
        return $stmt;
    }
}
    ?>