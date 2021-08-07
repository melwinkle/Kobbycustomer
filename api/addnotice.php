<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../includes/load.php';

$database = new Database();
$db = $database->connect();

$note = new notice($db);

$data =json_decode(file_get_contents("php://input"));

$note->date= $data->start;
$note->to= $data->rent;
$note->subject= $data->la;
$note->message= $data->end;


if($note->create()){
    echo $note->notice_id;
}
else{
    echo false;
}

?>