<?php
require_once './vendor/autoload.php';
require_once './config/constant.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('xxx@gmail.com')
    ->setPassword('pass');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail, $token)
{
    global $mailer;
    $body = '<!DOCTYPE html>
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
          background: #592f80;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <p>Thank you for signing up on our site. Please click on the link below to verify your account:.</p>
        <a href="http://localhost/verify-user/index.php?token=' . $token . '">Verify Email!</a>
      </div>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('Verify your email'))
        ->setFrom('xxx@gmail.com')
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

function sendPasswordResetLink($userEmail, $token){
	 global $mailer;
    $body = '<!DOCTYPE html>
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
          background: #592f80;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <p>Please click on the link below to reset your password.</p>
        <a href="http://localhost/verify-user/index.php?password-token=' . $token . '">Reset your password!</a>
      </div>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('Reset your password'))
        ->setFrom('xxx@gmail.com')
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