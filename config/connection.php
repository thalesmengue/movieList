<?php

$host = "";
$database = "";
$username = "";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $error = $e->getMessage();
}