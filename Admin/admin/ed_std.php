<?php
if(isset($_POST['edit_student'])) {
	$id = $_POST['student_id'];
	$name = $_POST['student_name'];
	$DoB = $_POST['student_DoB'];
	$gender = $_POST['student_gender'];
	$email = $_POST['student_email'];
	$address = $_POST['student_address'];
	$phone = $_POST['student_phone'];
	$pass = $_POST['student_password'];
}else{
	header("location:students.php");
}
include '../db_config/connection.php';
$student_id = $_REQUEST['student_id'];
$sql = "SELECT * FROM student where student_id = $student_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc())
	{
		$id = $row['student_id'];
		$name = $row['student_name'];
		$DoB = $row['student_DoB'];
		header('location:students.php?msg=0&name="'.$name.'"&DoB="'.$DoB.'"');
	}
} else {
	include '../db_config/connection.php';
	$sql = "UPDATE `student` SET `student_id`= '".$id."',`student_name`='".$name."',`student_DoB`='".$DoB."',`student_gender`='".$gender."',`student_email`='".$email."',`student_address`='".$address."',`student_phone`='".$phone."',`student_password`='".$pass."' WHERE `student_id` = '".$student_id."'";
	if ($conn->query($sql) === TRUE) {
		header('location:students.php?msg=1&name="'.$name.'"&DoB="'.$DoB.'"');
	} else {
		$error = $conn->error;
		header("location:students.php?err=$error");
	}
	$conn->close();
}
$conn->close();

?>
