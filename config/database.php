<?php
define("BASE_URL","http://weblearn.test/authentication/");

$dsn = "mysql:host=localhost;dbname=authentication;charset=utf8mb4";
$username = "root";
$password = "root";

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

} catch (PDOException $e) {
    echo "Connection error " . $e->getMessage();
}