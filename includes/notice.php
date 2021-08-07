<?php
class notice{
    private $conn;
    
    public $notice_id;
    public $date;
    public $to;
    public $subject;
    public $message;

    
    public function __construct($db){
        $this->conn =$db;
    }

    public function create(){
        $query= "INSERT INTO notice(`date`,`To`,`subject`, message_body)VALUES(:d,:t,:s,:m)";
        $stmt= $this->conn->prepare($query);

        $this->date = htmlspecialchars(strip_tags($this->date));
        $this->to =htmlspecialchars(strip_tags($this->to));
        $this->subject= htmlspecialchars(strip_tags($this->subject));
        $this->message =htmlspecialchars(strip_tags($this->message));


        $stmt->bindParam(':d',$this->date);
        $stmt->bindParam(':t',$this->to);
        $stmt->bindParam(':s',$this->subject);
        $stmt->bindParam(':m',$this->message);

        if($stmt->execute()){
            $this->notice_id =$this->conn->lastInsertId();
            return $this->notice_id;
        }
        printf("Error: %s.\n",$stmt->error);
        return false;
    }

    public function getAllnotes(){
        $active= $_GET['id'];
        $query ="SELECT * FROM notice WHERE notice_id='$active'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function delnote(){
        $query ="DELETE FROM notice WHERE notice_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam('id',$this->notice_id);
        $stmt->execute();
        return $stmt;
    }

    public function upnotice(){
        $query="UPDATE notice SET `date`=:d , `subject`=:s , message_body=:m WHERE `To`=:i";
        $stmt = $this->conn->prepare($query);
        $this->date = htmlspecialchars(strip_tags($this->date));
        $this->to =htmlspecialchars(strip_tags($this->to));
        $this->subject= htmlspecialchars(strip_tags($this->subject));
        $this->message =htmlspecialchars(strip_tags($this->message));

        $stmt->bindParam(':d',$this->date);

        $stmt->bindParam(':s',$this->subject);
        $stmt->bindParam(':m',$this->message);
        $stmt->bindParam(':i',$this->to);

        if($stmt->execute()){
            return true;
        }
        printf("error: %s .\n", $stmt->error);
        return false;
    }
    public function Allnotes(){
        $active= $_GET['id'];
        $query ="SELECT * FROM notice,tenant WHERE notice.`To`='$active' and tenant.tenant_id='$active'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function shopidentification(){
        $active =$_GET['id'];
        $query ="SELECT * FROM property where property_id= '$active'";
        $stmt=$this->conn->prepare($query);
        // $stmt ->bindParam(':id',$this->id);
        $stmt->execute();
        return $stmt;
    }
   
    
}