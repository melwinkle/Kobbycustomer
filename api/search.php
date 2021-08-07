<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../includes/load.php';

 $database = new Database();
 $db=$database->connect();

 $tenant = new tenants($db);

 $data = json_decode(file_get_contents("php://input"));

 $tenant->prop_id =$data->d;
 $result = $tenant->getTenantfromShop();

 $num = $result->rowCount();

 if($num >0){
   $cat_arr =array();
   $cat_arr['data'] =array(); 

   while( $row =$result->fetch(PDO::FETCH_ASSOC)){
       extract($row);
       $cat_item = array(
           'id'=>$tenant_id,
           'shop'=> $Name_of_the_shop
       );
       array_push($cat_arr['data'],$cat_item);
   }

   echo json_encode($cat_arr);
} 

?>