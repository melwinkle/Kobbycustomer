<?php
require_once 'vendor/autoload.php';

$transport = (new Swift_SmtpTransport('smtp.gmail.com',465,'ssl'))
    ->setUsername("kwabenakoranteng5@gmail.com")
    ->setPassword("morningglory");

$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail, $token){
    global $mailer;
    $body ='<!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="UTF-8">
    <title>Test mail</title>
    <style>
    .wrapper {
        padding: 20px;
        color: #444;
        font-size: 1.3em;
      }
      a {
        background: #eba84b;
        text-decoration: none;
        padding: 8px 15px;
        border-radius: 5px;
        color: #fff;
      }
    </style>
    </head>

    <body>
    <div class="wrapper">
    <p>Dear User,</p>
    <p>Please note that the following shops have their rent due today.</p>
    <p>Find below those shops:</p>
    <ul>';
    for($x=0 ;$x<count($token);$x++){
        $body .='<li>' .$token[$x] .'</li> ';  
    }
  $body .='
  </ul>
  <p>Thanks,</p>
    <p>Bethel Properties Limtied</p>
     </div>
    </body>

</html>';
       // Create a message
    $message = (new Swift_Message('Bethel Properties LTD- RENT DUE'))
    ->setFrom("kwabenakoranteng5@gmail.com")
    ->setTo($userEmail)
    ->setBody($body, 'text/html');

// Send the message
$result = $mailer->send($message);

if ($result > 0) {
    return true;
} else {
    return false;
}

}

?>