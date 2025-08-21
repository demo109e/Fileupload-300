<?php
$host = "your_mysql_host";
$user = "your_mysql_user";
$pass = "your_mysql_password";
$db   = "your_mysql_database";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
