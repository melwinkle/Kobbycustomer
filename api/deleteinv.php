<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../includes/load.php';


$database = new Database();
$db = $database->connect();

$inv = new invoice($db);

$data = json_decode(file_get_contents("php://input"));

$inv->billto =$data->id;

if($inv->delinv()){
    echo true;
}