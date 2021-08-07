<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../includes/load.php';

$database = new Database();
$db =$database->connect();
$user = new users($db);
$p = new pass($db);

$data = json_decode(file_get_contents("php://input"));

$temp =base64_encode($data->pass2);

$user->pass =$temp;
$user->Email = $data->em;

$p->email =$data->em;
if($user->changepass()){
    $p->deletepass();
    echo true;
}else{
echo false;
}
?>