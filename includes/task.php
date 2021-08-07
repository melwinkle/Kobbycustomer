<?php
class task{
    private $conn;
    public $task_id;
    public $date_added;
    public $message;


    public function __construct($db){
        $this->conn=$db;
    }

    public function create(){
        $query="INSERT INTO task(task)VALUES(:t)";

        $stmt = $this->conn->prepare($query);

        $this->message =htmlspecialchars(strip_tags($this->message));

            $stmt->bindParam(':t',$this->message);

        if($stmt->execute()){
            $this->task_id =$this->conn->lastInsertId();
            return true;
        }
        printf("Error: %s. \n",$stmt->error);
        return false;
    }

    public function getAlltasks(){
        $query ="SELECT * from task order by date_added desc";
        $stmt =$this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function gettask(){
        $query ="SELECT * from task";
        $stmt =$this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function deletetask(){
        $query="DELETE from task WHERE task_id=:t";
        $stmt =$this->conn->prepare($query);
        $stmt->bindParam(':t',$this->task_id);
        $stmt->execute();
        return $stmt;
    }
}