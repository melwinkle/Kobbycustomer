<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../includes/load.php';

$database = new Database();
$db =$database->connect();
$user = new users($db);

$data = json_decode(file_get_contents("php://input"));

$user->First_name=$data->first;
$user->Last_name=$data->lname;
$user->username=$data->use;
$user->id = $data->id;

if($user->updateprofile()){
    echo true;
}
else{
    echo false;
}

?>