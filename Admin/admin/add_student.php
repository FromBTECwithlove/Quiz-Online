<?php
if(isset($_POST['add_student'])) {
	$id = $_POST['student_id'];
	$name = $_POST['student_name'];
	$DoB = $_POST['student_DoB'];
	$gender = $_POST['student_gender'];
	$email = $_POST['student_email'];
	$address = $_POST['student_address'];
	$phone = $_POST['student_phone'];
}else{
	header("location:./");
}
include '../db_config/connection.php';
$sql = "SELECT * FROM student where student_id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$id = $row['student_id'];
		$name = $row['student_name'];
		$DoB = $row['student_DoB'];
		header('location:students.php?msg=0&name="'.$name.'"&DoB="'.$DoB.'&id="'.$id.'"');
	}
} else {
	include '../db_config/connection.php';
	$sql = "INSERT INTO `student` (`student_id`, `student_name`, `student_DoB`, `student_gender`, `student_email`, `student_address`, `student_phone`, `student_password`) VALUES ('$id','$name','$DoB','$gender','$email','$address','$phone','123@123a')";
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


