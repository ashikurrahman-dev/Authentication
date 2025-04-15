<?php
require( "../config/database.php");
session_start();
function validateInput($input)
{
    return trim(htmlspecialchars($input));
}

function validateEmail($email)
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        throw new Exception("Invalid email.");
    }
}

function isEmailUnique($email){
    GLOBAL $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email");
    $stmt->execute(['email' => $email]);
    $total = $stmt->rowCount();

    if($total){
        throw new Exception('Email already exists.');
    }
}