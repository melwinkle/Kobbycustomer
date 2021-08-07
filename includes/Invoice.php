<?php
class invoice {
    private $conn;
    private $table;
    
    public $id;
    public $billto;
    public $address;
    public $date;
    public $prop_id;
    public $des;
    public $duration;
    public $charge;
    public $amount;
    public $sub;
    public $inv;


    public function __construct($db){
        $this->conn =$db;
    }

    public function create(){
        $query="INSERT INTO invoice (Bill_to, `address`, `date`,Property_id, `description`,duration, Monthly_charge, Total_amount,`subject`,invoice_number) VALUES(:bil ,:ad, :d ,:prop ,:de, :ration, :charge ,:total,:s,:i)";   
       
       $stmt= $this->conn->prepare($query);

       $this->billto = htmlspecialchars(strip_tags($this->billto));
       $this->address =htmlspecialchars(strip_tags($this->address));
       $this->date =htmlspecialchars(strip_tags($this->date));
       $this->prop_id =htmlspecialchars(strip_tags($this->prop_id));
       $this->des =htmlspecialchars(strip_tags($this->des));
       $this->duration =htmlspecialchars(strip_tags($this->duration));
       $this->charge =htmlspecialchars(strip_tags($this->charge));
       $this->amount =htmlspecialchars(strip_tags($this->amount));
       $this->sub =htmlspecialchars(strip_tags($this->sub));
       $this->inv =htmlspecialchars(strip_tags($this->inv));



       $stmt ->bindParam(':bil',$this->billto);
       $stmt->bindParam(':ad',$this->address);
       $stmt->bindParam(':d',$this->date);
       $stmt->bindParam(':prop',$this->prop_id);
       $stmt->bindParam(':de',$this->des);
       $stmt->bindParam(':ration',$this->duration);
       $stmt->bindParam(':charge',$this->charge);
       $stmt->bindParam(':total',$this->amount);
       $stmt->bindParam(':s',$this->sub);
       $stmt->bindParam(':i',$this->inv);



       if($stmt->execute()){
           $this->id = $this->conn->lastInsertId();
           return $this->id;

       }
       printf("Error: %s.\n" , $stmt->error);
       return false;
    }


    public function getAllinvoices(){
        $active= $_GET['id'];
        $query ="SELECT * from invoice left join tenant on invoice.Bill_to = tenant.tenant_id where invoice.invoice_id='$active';";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function delinv(){
        $query ="DELETE FROM invoice WHERE id =:t";
        $stmt= $this->conn->prepare($query);
        $stmt->bindParam(':t',$this->billto);
        $stmt->execute();
        return $stmt;
    }

    public function upinv(){
        $query="UPDATE invoice SET `date`=:d , `description`=:de , `duration`=:ration , Monthly_charge=:charge , Total_amount=:total , `subject`=:s , invoice_number=:i where Bill_to=:bil";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':d',$this->date);
        $stmt->bindParam(':de',$this->des);
        $stmt->bindParam(':ration',$this->duration);
        $stmt->bindParam(':charge',$this->charge);
        $stmt->bindParam(':total',$this->amount);
        $stmt->bindParam(':i',$this->inv);
       $stmt->bindParam(':s',$this->sub);
       $stmt ->bindParam(':bil',$this->billto);

       if($stmt->execute()){
        return true;
    }
        printf("error: %s .\n", $stmt->error);
        return false;

    }
    
    
}
?>