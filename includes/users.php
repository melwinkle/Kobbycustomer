<?php
class users{

    private $conn;
    private $table ='Users';

    public $id;
    public $First_name;
    public $Last_name;
    public $Email;
    public $pass;
    public $photo;
    public $level;
    public $stats;
    public $token;
    public $username;
    public $permission;


    public function __construct($db){
        $this->conn =$db;
    }

    public function create(){
        $query=" INSERT INTO Users (Firstname,lastname,Email,Pass,`token`,`verified`,Username,permission)VALUES(:fname,:lname,:em,:p,:t,0,:user,2)";

        $stmt= $this->conn->prepare($query);

        $this->First_name =htmlspecialchars(strip_tags($this->First_name));
        $this->Last_name =htmlspecialchars(strip_tags($this->Last_name));
        $this->Email =htmlspecialchars(strip_tags($this->Email));
        $this->pass =htmlspecialchars(strip_tags($this->pass));
        $this->username =htmlspecialchars(strip_tags($this->username));
       

        $stmt->bindParam(':fname', $this->First_name);
        $stmt->bindParam(':lname',$this->Last_name);
        $stmt->bindParam(':em',$this->Email);
        $stmt->bindParam(':p',$this->pass);
        $stmt->bindParam(':t',$this->token);
        $stmt->bindParam(':user',$this->username);
     
        if($stmt->execute()){
            $this->id =$this->conn->lastInsertId();
            return true;
        }
        printf("Error: %s. \n", $stmt->error);
        return false;
    }
    
    public function getId(){
        return $this->customer_id;
    }

    public function authenticate(){
        $user =$_POST['username'];
        $query ="SELECT * FROM Users where Username= '$user'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function validateEmail(){
        $query ="SELECT COUNT(*) as exist from Users where Email=:e";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':e',$this->Email);
        $stmt->execute();
        return $stmt;
    }

    public function updateprofile(){
        $query ='UPDATE Users SET Firstname =:f ,lastname=:l ,Username= :e WHERE user_id=:id';

        $stmt =$this->conn->prepare($query);
        $stmt->bindParam(':f',$this->First_name);
        $stmt->bindParam(':l',$this->Last_name);
        $stmt->bindParam(':e',$this->username);
        $stmt->bindParam('id',$this->id);
        
        if($stmt->execute()){
            return true;
        }
        printf("error: %s .\n", $stmt->error);
        return false;
    }

    public function changepassword(){
        $query ='UPDATE Users SET Pass=:pass WHERE user_id=:id';
        $stmt=$this->conn->prepare($query);

        $this->pass = htmlspecialchars(strip_tags($this->pass));
        
        $stmt->bindParam(':pass',$this->pass);
        $stmt->bindParam(':id',$this->id);

        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n" , $stmt->error);
        return false;
    }

    public function getdets(){
        $acc = $_SESSION["id"];
        $query = "SELECT * from Users where user_id !='$acc'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getdetails(){
        $acc = $_SESSION["id"];
        $query = "SELECT * from Users where user_id ='$acc'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function details(){
        $query = "SELECT * from Users ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function duedate(){
        $query = "SELECT * from contracts where DATE(end_date)=CURRENT_DATE";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function uploadem(){
        $query ='UPDATE Users set User_photo =:p WHERE user_id=:i';
        $stmt =$this->conn->prepare($query);
        $stmt->bindParam(':i',$this->id);
        $stmt->bindParam(':p',$this->photo);
       
        
        if($stmt->execute()){
            return true;
        }
        printf("error: %s .\n", $stmt->error);
        return false;

    }

    public function stateOn(){
        $query ="UPDATE Users set stats=1 WHERE user_id=:id";
        $stmt =$this->conn->prepare($query);
        $stmt->bindParam('id',$this->id);

        if($stmt->execute()){
            return true;
        }
        printf("error: %s ./n", $stmt->error);
        return false;

    }

    public function stateOff(){
        $query ="UPDATE Users set stats=0 WHERE user_id=:id";
        $stmt =$this->conn->prepare($query);
        $stmt->bindParam('id',$this->id);

        if($stmt->execute()){
            return true;
        }
        printf("error: %s ./n", $stmt->error);
        return false;

    }
    public function adminate(){
        $query ="UPDATE Users set user_level=1 WHERE user_id=:id";
        $stmt =$this->conn->prepare($query);
        $stmt->bindParam('id',$this->id);

        if($stmt->execute()){
            return true;
        }
        printf("error: %s ./n", $stmt->error);
        return false;

    }

    public function reduce(){
        $query ="UPDATE Users set user_level=0 WHERE user_id=:id";
        $stmt =$this->conn->prepare($query);
        $stmt->bindParam('id',$this->id);

        if($stmt->execute()){
            return true;
        }
        printf("error: %s ./n", $stmt->error);
        return false;

    }
    public function changepass(){
        $query ='UPDATE Users SET Pass=:pass WHERE Email=:i';
        $stmt=$this->conn->prepare($query);

        $this->pass = htmlspecialchars(strip_tags($this->pass));
        
        $stmt->bindParam(':pass',$this->pass);
        $stmt->bindParam(':i',$this->Email);

        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n" , $stmt->error);
        return false;
    }
   
}
?>