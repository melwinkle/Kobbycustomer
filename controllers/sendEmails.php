<?php
require_once '../vendor/autoload.php';

$transport = (new Swift_SmtpTransport('smtp.gmail.com',465,'ssl'))
    ->setUsername("Bethelpropertiesltd5@gmail.com")
    ->setPassword("Bethel@123");

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
    <p>Thank you for signing up on our site. You need to verify your account before you are granted access to the site</p>
    <p>Please be adviced that this email will be used as a primary contact in case we need more information or to clarify anything</p> 
    <p>Please click on the link below to verify your account:</p>
    <a href="https://bethelproperties.herokuapp.com/verify_email.php?token=' . $token . '" target="_parent">Verify Email!</a>
    <p>Thanks,</p>
    <p>Bethel Properties Limtied</p>
     </div>
    </body>

</html>';
       // Create a message
    $message = (new Swift_Message('Bethel Properties LTD -Verify your email'))
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