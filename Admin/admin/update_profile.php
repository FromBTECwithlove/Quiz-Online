<?php

include 'check_login.php';
$fname = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$new_password = $_POST['password1'];
$gender = $_POST['gender'];

include '../db_config/connection.php';
$sql = "SELECT * FROM tinhtv_admin where email='$email' and id != '$current_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
		$fullname22 = $row['fullname'];
       header("location:profile.php?msg=Email $email is used by $fullname22");
    }
} else {
    include '../db_config/connection.php';
$sql = "UPDATE tinhtv_admin SET fullname='$fname', gender='$gender', email='$email', address='$address', password='$new_password' WHERE id='$current_id'";

if ($conn->query($sql) === TRUE) {
    header("location:logout.php");
} else {
    header("location:./?acuf");
}

$conn->close();
}
$conn->close();




?>