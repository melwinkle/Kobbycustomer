<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../includes/load.php';


$database = new Database();
$db = $database->connect();

$not = new notice($db);

$data = json_decode(file_get_contents("php://input"));

$not->notice_id =$data->id;

if($not->delnote()){
    echo true;
}

?>