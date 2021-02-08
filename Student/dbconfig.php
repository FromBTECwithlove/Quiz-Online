<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exam_online";
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
    die("Error connection: " . $conn->connect_error);
}
?>