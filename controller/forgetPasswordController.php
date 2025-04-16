<?php
require("../includes/functions.php");
require("../vendor/autoload.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $email = validateInput($_POST['email']);
        if ($email === '') {
            throw new Exception('Email can not be empty.');
        }
        validateEmail($email);

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);
        $total = $stmt->rowCount();
        if (!$total) {
            throw new Exception("Email not found.");
        }

        $otp = rand(100000, 999999);
        $stmt = $pdo->prepare("UPDATE users SET otp=? WHERE email=?");
        $stmt->execute([$otp, $email]);

        $_SESSION['otp'] = $otp;

        try {
            // Looking to send emails in production? Check out our Email API/SMTP product!
            $phpmailer = new PHPMailer();
            $phpmailer->isSMTP();
            $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = '3e0ba1483da339';
            $phpmailer->Password = '40a5651de0da01';

            $phpmailer->setFrom('ashikur@gmail.com');
            $phpmailer->addAddress($email);
            $phpmailer->addReplyTo('ashikur@gmail.com');
            $phpmailer->isHTML(true);
            $phpmailer->Subject = 'Forget Password';
            $phpmailer->Body = "<p>Your otp code is <strong>$otp</strong></p>";
            $phpmailer->send();

        } catch (Exception $e) {
            $error = $e->getMessage();
        }
        header("Location: " . BASE_URL . "public/validateOTP.php?email=$email");
        exit();

    } catch (Exception $e) {
        $error = $e->getMessage();
    }

}