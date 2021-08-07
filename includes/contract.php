<?php
class contract{
    private $conn;

    public $contract_id;
    public $property_id;
    public $tenant_id;
    public $start_date;
    public $end_date;
    public $amount_words;
    public $amount;
    public $total;
    public $total_words;
    public $sewage;
    public $sewage_words;
    public $shops;


    public function __construct($db){
        $this->conn=$db;
    }

    public function create(){
        $query ="INSERT INTO contracts(property_id,tenant_id,startdate,end_date,amount_paid,amount_paid_in_words,Total_amount,Total_amount_in_words,Sewage_amount,Sewage_amount_words,number_of_shops)VALUES
        (:p,:ti,:s,:e,:a,:w,:t,:tw,:se,:sew,:n)";
        $stmt = $this->conn->prepare($query);

        $this->property_id =htmlspecialchars(strip_tags($this->property_id));
        $this->tenant_id =htmlspecialchars(strip_tags($this->tenant_id));
        $this->start_date =htmlspecialchars(strip_tags($this->start_date));
        $this->end_date =htmlspecialchars(strip_tags($this->end_date));
        $this->amount_words =htmlspecialchars(strip_tags($this->amount_words));
        $this->amount=htmlspecialchars(strip_tags($this->amount));
        $this->total=htmlspecialchars(strip_tags($this->total));
        $this->total_words=htmlspecialchars(strip_tags($this->total_words));
        $this->sewage=htmlspecialchars(strip_tags($this->sewage));
        $this->sewage_words=htmlspecialchars(strip_tags($this->sewage_words));
        $this->shops=htmlspecialchars(strip_tags($this->shops));

        $stmt->bindParam(':p',$this->property_id);
        $stmt->bindParam(':ti',$this->tenant_id);
        $stmt->bindParam(':s',$this->start_date);
        $stmt->bindParam(':e',$this->end_date);  
        $stmt->bindParam(':a',$this->amount);
        $stmt->bindParam(':w',$this->amount_words);
        $stmt->bindParam(':t',$this->total);
        $stmt->bindParam(':tw',$this->total_words);
        $stmt->bindParam(':se',$this->sewage);
        $stmt->bindParam(':sew',$this->sewage_words);
        $stmt->bindParam(':n',$this->shops);

        if($stmt->execute()){
            $this->contract_id=$this->conn->lastInsertId();
            return true;
        }
        printf("Error: %s. \n",$stmt->error);
        return false;
    }

    public function editrent(){
        $query="UPDATE contracts SET end_date=:e where tenant_id=:ti";
        $stmt= $this->conn->prepare($query);

        $stmt->bindParam(':e',$this->end_date);
        $stmt->bindParam(':ti',$this->tenant_id);

        if($stmt->execute()){
            return true;
        }
        printf("error: %s ./n", $stmt->error);
        return false;
    }

}