<?php
$host = 'localhost';
$dbname = 'car';
$username = 'root'; 

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>