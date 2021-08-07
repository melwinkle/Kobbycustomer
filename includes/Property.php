<?php
class property{
    private $conn;

    public $id;
    public $name;
    public $location;
    

    public function __construct($db){
        $this->conn=$db;
    }

    public function create(){
        $query ="INSERT INTO property(property_name,property_location) VALUES (:n,:l)";

        $stmt=$this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->location =htmlspecialchars(strip_tags($this->location));

        $stmt->bindParam(':n', $this->name);
        $stmt->bindParam(':l',$this->location);

        if($stmt->execute()){
            $this->id=$this->conn->lastInsertId();
            return true;
        }
        printf("Error: %s. \n",$stmt->error);
        return false;
    }

    public function getId(){
        return $this->id;
    }

    public function getproperty(){
        $query ="SELECT * FROM property where property_id= :id";
        $stmt=$this->conn->prepare($query);
        $stmt ->bindParam(':id',$this->id);
        $stmt->execute();
        return $stmt;
    }

    public function getprops(){
        $active =$_SESSION['shop'];
        $query ="SELECT * FROM property where property_id= '$active'";
        $stmt=$this->conn->prepare($query);
        // $stmt ->bindParam(':id',$this->id);
        $stmt->execute();
        return $stmt;
    }
    public function pp(){
        $query ="SELECT * FROM property";
        $stmt =$this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function shopidentification(){
        $active =$_GET['id'];
        $query ="SELECT * FROM property where property_id= '$active'";
        $stmt=$this->conn->prepare($query);
        $stmt ->bindParam(':id',$this->id);
        $stmt->execute();
        return $stmt;
    }
   
}