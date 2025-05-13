<?php
$host = "localhost";
$username = "rgaaprux_scriptorium_db";
$password = "EFpAYNxtne7EKbF6dpfF";
$database = "rgaaprux_scriptorium_db";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?> 