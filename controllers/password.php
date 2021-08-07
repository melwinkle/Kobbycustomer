<?php
require_once 'vendor/autoload.php';

$transport = (new Swift_SmtpTransport('smtp.gmail.com',465,'ssl'))
    ->setUsername("Bethelpropertiesltd5@gmail.com")
    ->setPassword("Bethel@123");

$mailer = new Swift_Mailer($transport);

function sendpassEmail($userEmail, $token){
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
    <p>Dear user,</p>
    <p>Please click on the following link to reset your password.</p>
    <p>-------------------------------------------------------------</p>
    <p><a href="http://localhost/inventory/reset-password.php?key='.$token.'&email='.$userEmail.'&action=reset" target="_parent">
    https://www.bethelpropertiesltd/reset-password.php?key='.$token.'&email='.$userEmail.'&action=reset</a></p> 
    <p>-------------------------------------------------------------</p> 
    <p>Please be sure to copy the entire link into your browser.
    The link will expire after 1 day for security reason.</p> 
    <p>Thank you for signing up on our site. Please click on the link below to verify your account:</p>
    <p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>
<p>Thanks,</p>
<p>Bethel Properties Limtied</p>
     </div>
    </body>

</html>';
       // Create a message
    $message = (new Swift_Message('Bethel Properties LTD-Password recovery'))
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