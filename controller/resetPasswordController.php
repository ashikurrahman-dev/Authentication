<?php 
require('../includes/functions.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    try{
        $email = validateInput($_REQUEST['email']);
        $password = validateInput($_POST['password']);
        $retype_password = validateInput($_POST['retype_password']);
        
        if($password === '' || $retype_password === ''){
            throw new Exception('Password field can not be empty.');
        }
        if(strlen($password) < 8){
            throw new Exception('Password minimun 8 charecters');
        }
        if($password !== $retype_password){
            throw new Exception('Password must be match');
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET password=? WHERE email=?");
        $stmt->execute([$password, $email]);

        header("Location: " . BASE_URL . "public/login.php");
        exit();
    } catch(Exception $e){
        $error = $e->getMessage();
    }
}