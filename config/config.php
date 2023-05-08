<?php 
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "esports&gaming";

$dsn = "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4";
$pdo = new PDO($dsn, $DB_USER, $DB_PASS);

$connection = mysqli_connect ($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die
("Database is not connected. Please try again.");
?>