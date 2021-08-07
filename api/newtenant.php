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

$tenant->first_name = $data->fname;
$tenant->last_name = $data->lname;
$tenant->type= $data->t;
$tenant->contact= $data->phone;
$tenant->shop= $data->s;
$tenant->prop_id = $data->p;
$tenant->add =$data->ad;

if($tenant->create()){
    echo true;
}
else{
    echo false;
}