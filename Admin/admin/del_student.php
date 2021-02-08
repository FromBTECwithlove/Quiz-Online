<?php
$quesid = $_GET['student_id'];
$qupage = $_GET['student_name'];

include '../db_config/connection.php';
$student_id = $_REQUEST['student_id'];
$sql = "DELETE FROM student WHERE student_id='".$student_id."'";
if ($conn->query($sql) === TRUE) {
header("location:students.php");
} else {
header("location:students.php");
}

$conn->close();

?>