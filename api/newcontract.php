<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../includes/load.php';

$database = new Database();
$db =$database->connect();
$cont = new contract($db);


$data =json_decode(file_get_contents("php://input"));

$cont->tenant_id= $data->rent;
$cont->property_id= $data->t;
$cont->start_date=$data->start;
$cont->end_date= $data->end;
$cont->amount_words= $data->amw;
$cont->amount= $data->am;
$cont->total= $data->to;
$cont->total_words= $data->tow;
$cont->sewage= $data->se;
$cont->sewage_words= $data->sew;
$cont->shops= $data->sh;


if($cont->create()){
    echo true;
}
else{
    echo false;
}