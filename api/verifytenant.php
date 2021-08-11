<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../includes/load.php';

$database = new Database();
$db =$database->connect();
$tenant = new tenants($db);

$data = json_decode(file_get_contents("php://input"));
$keywords =$data->tena;

$tenant->prop_id = $data->shop;

$result =$tenant->vtenant($keywords);
$num = $result->rowCount();
$row = $result->fetch(PDO::FETCH_ASSOC);

if($num>0){
    echo $row['tenant_id'];
}
else{
    echo false;
}