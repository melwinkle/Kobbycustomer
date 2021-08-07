<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../includes/load.php';

$database =new Database();
$db =$database->connect();

$invo = new invoice($db);

$data =json_decode(file_get_contents("php://input"));


$invo->billto=$data->rent;
$invo->address=$data->add;
$invo->date=$data->dat;
$invo->prop_id=$data->pro;
$invo->des=$data->d;
$invo->duration=$data->dura;
$invo->charge=$data->Char;
$invo->amount=$data->a;
$invo->inv=$data->invoice;
$invo->sub =$data->subject;

if($invo->create()){
    echo $invo->id;
}
else{
    echo false;
}



