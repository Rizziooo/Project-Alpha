<?php
$hostname = 'localhost'; // Standarde localhost voor XAMPP
$database = 'login_system';
$username = 'root'; // Standaard gebruikersnaam voor XAMPP
$password = ''; // Laat wachtwoord leeg voor XAMPP

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>