<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../includes/load.php';

$database = new Database();
$db = $database->connect();

$feed = new feedback($db);

$data =json_decode(file_get_contents("php://input"));

$feed->tenant_id= $data->tena;
$feed->mess= $data->message;
$feed->property_id= $data->shop;


if($feed->create()){
    echo true;
}
else{
    echo false;
}

?>