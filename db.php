<?php
$host = "localhost";
$user = "root";   // Change if your MySQL username differs
$pass = "";       // Add your MySQL password if any
$dbname = "fashion_store";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}
?>
