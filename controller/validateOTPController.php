<?php
require("../includes/functions.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $email = validateInput($_REQUEST['email']);
        $otp = validateInput($_POST['otp']);
        if ($otp === '') {
            throw new Exception('otp can not be empty');
        }

        if ($otp != $_SESSION['otp']) {
            throw new Exception('The OTP you entered is incorrect');
        }

        $stmt = $pdo->prepare("UPDATE users set otp=? WHERE email=?");
        $stmt->execute([0, $email]);

        unset($_SESSION['otp']);
        header('Location: ' . BASE_URL . "public/resetPassword.php?email=$email");
        exit();
        
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>