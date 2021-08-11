<?php
class tenants{
    private $conn;
    private $table  ='tenants';

    public $tenant_id;
    public $first_name;
    public $last_name;
    public $type;
    public $contact;
    public $shop;
    public $prop_id;
    public $add;
    public $stat;




    public function __construct($db)
    {
        $this->conn =$db;
    }

    public function create(){
        $query ="INSERT INTO tenant(FirstName, LastName, type_of_business ,contact_number,Name_of_the_shop, property_id ,`status`,`address`) VALUES (:fname,:lname,:t,:con,:sh,:p,1,:a)";

        $stmt =$this->conn->prepare($query);

        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name =htmlspecialchars(strip_tags($this->last_name));
        $this->contact = htmlspecialchars(strip_tags($this->contact));
        $this->type = htmlspecialchars(strip_tags($this->type));
        $this->shop = htmlspecialchars(strip_tags($this->shop));
        $this->prop_id =htmlspecialchars(strip_tags($this->prop_id));
        $this->add =htmlspecialchars(strip_tags($this->add));


        $stmt->bindParam(':fname',$this->first_name);
        $stmt->bindParam(':lname',$this->last_name);
        $stmt->bindParam(':t',$this->type);
        $stmt->bindParam(':con',$this->contact);
        $stmt->bindParam(':sh',$this->shop);
        $stmt->bindParam(':p',$this->prop_id);
        $stmt->bindParam(':a',$this->add);

        if($stmt->execute()){
            $this->tenant_id =$this->conn->lastInsertId();
            return true;
        }
        printf("Error: %s.\n",$stmt->error);
        return false;
    }

    public function getId(){
        return $this->tenant_id;
    }

    public function getAllTenants(){
        $active="active";
        $query ="SELECT * FROM tenant where `status` = '$active'";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getTenantsShop(){
        $s =$_SESSION['shop'];
        $active="1";
        $query ="SELECT * FROM tenant where property_id ='$s' and status ='$active'";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;

    }
    public function getTenantsfromShop(){
        $s =$_SESSION['shop'];
        $query ="SELECT * FROM tenant where property_id ='$s'";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;

    }
    public function getd(){
        $i =$_GET["id"];
        $query = "SELECT * from tenant where tenant_id ='$i'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function ged(){
        $i =$_GET["id"];
        $query = "SELECT * from tenant,contracts where tenant.tenant_id ='$i' and contracts.tenant_id='$i'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function updateprof(){
        $query="UPDATE tenant SET FirstName=:f , LastName=:l, type_of_business=:t, contact_number=:c, Name_of_the_shop=:n WHERE tenant_id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':f',$this->first_name);
        $stmt->bindParam(':l',$this->last_name);
        $stmt->bindParam(':t',$this->type);
        $stmt->bindParam(':c',$this->contact);
        $stmt->bindParam(':n',$this->shop);
        $stmt->bindParam(':id',$this->tenant_id);
      
        if($stmt->execute()){
            return true;
        }
        printf("error: %s ./n", $stmt->error);
        return false;
    }

    public function deletetent(){
        $query="UPDATE tenant SET status=0 WHERE tenant_id=:t";
        $stmt =$this->conn->prepare($query);
        $stmt->bindParam(':t',$this->tenant_id);
        $stmt->execute();
        return $stmt;
    }

    public function rent(){
        $active=$_SESSION['shop'];
        $query =" SELECT *,CURRENT_DATE-end_date as diff FROM contracts inner join tenant on tenant.tenant_id=contracts.tenant_id inner join property on property.property_id=contracts.property_id WHERE contracts.property_id='$active' and CURRENT_DATE-end_date>=0 and CURRENT_DATE-end_date<=30";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }



    public function sway(){
        $query="SELECT Name_of_the_shop,CURRENT_DATE-end_date as diff FROM contracts inner join tenant on tenant.tenant_id=contracts.contract_id WHERE CURRENT_DATE-end_date>=0 and CURRENT_DATE-end_date<=30";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function emz(){
        $query="SELECT Email from Users";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getTenants(){
        $s =$_SESSION['shop'];
        $active="1";
        $query ="SELECT tenant.tenant_id, tenant.Name_of_the_shop FROM tenant left join contracts on contracts.tenant_id=tenant.tenant_id where contracts.tenant_id is null and tenant.property_id ='$s' and tenant.status ='$active'";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;

    }

    public function getTenantfromShop(){
        $query ="SELECT * FROM tenant where property_id = :i";
        $stmt= $this->conn->prepare($query);
        $stmt->bindParam(':i',$this->prop_id);
        $stmt->execute();
        return $stmt;

    }

    public function vtenant($keywords){
            $query = "SELECT * from tenant where property_id=? and Name_of_the_shop LIKE ?";
            $stmt = $this->conn->prepare($query);
            
            $keywords=htmlspecialchars(strip_tags($keywords));
            $keywords ="%{$keywords}%";
            $stmt->bindParam(1,$this->prop_id);
            $stmt->bindParam(2,$keywords);
           
            $stmt->execute();
            return $stmt;
    }
    public function getco(){
        $i =$_GET["id"];
        $query = "SELECT * from tenant inner join property on tenant.tenant_id=property.tenant_id where tenant.tenant_id='$i'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

}