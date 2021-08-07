<?php
class feedback{
    private $conn;

    public $feedback_id;
    public $tenant_id;
    public $feed;
    public $property_id;

    public function __construct($db){
        $this->conn =$db;
    }

    public function create(){
        $query="INSERT INTO feedback(tenant_id,Feedback,property_id)VALUES(:t,:f,:l)";

        $stmt=$this->conn->prepare($query);

        $this->tenant_id =htmlspecialchars(strip_tags($this->tenant_id));
        $this->feed =htmlspecialchars(strip_tags($this->feed));
        $this->property_id =htmlspecialchars(strip_tags($this->property_id));



        $stmt->bindParam(':t',$this->tenant_id);
        $stmt->bindParam(':f',$this->feed);
        $stmt->bindParam(':l',$this->property_id);


        if($stmt->execute()){
            $this->feedback_id =$this->conn->lastInsertId();
            return true;
        }
        printf("Error: %s. \n",$stmt->error);
        return false;
    }

    public function getAllcomplaints(){
       $active =$_SESSION['shop'];
       $ten = $_GET['id'];
       $query ="SELECT * FROM feedback where tenant_id='$ten' and property_id='$active'";
       $stmt = $this->conn->prepare($query);
       $stmt->execute();
       return $stmt; 
    }
    

        
}