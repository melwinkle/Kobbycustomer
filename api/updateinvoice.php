<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../includes/load.php';

$database = new Database();
$db =$database->connect();
$in = new invoice($db);

$data = json_decode(file_get_contents("php://input"));

$in->date= $data->dat;
$in->sub= $data->subject;
$in->inv= $data->invoice;
$in->des= $data->d;
$in->duration =$data->dura;
$in->charge =$data->Char;
$in->amount=$data->a;
$in->billto =$data->rent;


if($in->upinv()){
    echo true;
}
else{
    echo false;
}