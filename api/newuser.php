<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../includes/load.php';
require '../controllers/sendEmails.php';

$database = new Database();
$db = $database->connect();
$user = new users($db);

$data = json_decode(file_get_contents("php://input"));

$temp =base64_encode($data->p);
$tok = bin2hex(random_bytes(50));
$email = $data->em;
$user->First_name= $data->fname;
$user->Last_name= $data->lname;
$user->Email=$data->em;
$user->pass=$temp;
$user->token = $tok;
$user->username = $data->u;


if(sendVerificationEmail($email,$tok)){
    $user->create();
    echo true; 
}

?>

