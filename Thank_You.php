<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; 
function sendMail($email, $fname, $lname) {

// Load Composer's autoloader
require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       =  'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'dmoxley05@gmail.com';                     // SMTP username
    $mail->Password   = '';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('dmoxley05@gmail.com , Donya');
    $mail->addAddress($email , $fname );     // Add a recipient
   

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Thank You';
    $mail->Body    = '<b>Thank You!</b> \n I appreciate you for testing this componet';
    $mail->AltBody = 'Thank You!\n I appreciate you for testing this componet';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}


?>
