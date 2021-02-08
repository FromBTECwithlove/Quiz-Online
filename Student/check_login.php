<?php
session_start();
$current_user = $_SESSION['fullname'];
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	$myusername = $_SESSION['username'];
	include 'dbconfig.php';
	$sql = "SELECT * FROM student WHERE student_name='$myusername' or student_email='$myusername' and permission='3'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc()) {
			$current_id = $row['id'];
		}
	}
	$conn->close();

}else {
	header("location:../?login_err=You need to login first.");
}
?>