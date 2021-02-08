<?php
session_start();
$current_user = $_SESSION['fullname'];
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	$myusername = $_SESSION['username'];
	include '../db_config/connection.php';
	$sql = "SELECT * FROM tinhtv_admin where username='$myusername' or email='$myusername' and permission='1'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc()) {
			$current_id = $row['id'];
		}
	} else {
		header("../?login_err=You must be Administrator");
	}
	$conn->close();

} else {
	header("location:../?login_err=You need to login first.");
}
?>