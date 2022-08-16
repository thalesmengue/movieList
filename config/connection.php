<?php

$host = "localhost";
$database = "movieTest";
$username = "root";
$pass = "root";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $error = $e->getMessage();
}