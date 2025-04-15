<?php 
require( "../includes/functions.php");

if(isset($_SESSION["user"])){
    header("Location: " . BASE_URL ."public/dashboard.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    try{
        $name = validateInput($_POST['name']);
        $email = validateInput($_POST['email']);
        $password = validateInput($_POST['password']);
        $retype_password = validateInput($_POST['retype_password']);

        if($name === ''){
            throw new Exception('Name can not be empty.');
        }
        if($email === ''){
            throw new Exception('Email can not be empty.');
        }

        validateEmail($email);
        isEmailUnique($email);

        if($password === '' || $retype_password === ''){
            throw new Exception('Password field can not be empty.');
        }
        if(strlen($password) < 8){
            throw new Exception('Password minimum 8 charecters.');
        }
        if($password !== $retype_password){
            throw new Exception('Password must be match.');
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->execute([
            "name" => $name,
            "email" => $email,
            "password" => $password
        ]);

        header("location: " . BASE_URL . "public/login.php");
        exit();
    } catch(Exception $e){
        $error = $e->getMessage();
    }    
}