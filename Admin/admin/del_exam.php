<?php

$exam_id= $_REQUEST['exam_id'];

include '../db_config/connection.php';

$query = mysqli_query($conn, "DELETE FROM ques_exam WHERE exam_id = '".$exam_id."'");

$sql = mysqli_query($conn, "DELETE FROM exam WHERE exam_id='".$exam_id."'");

if (($sql&&$query) === TRUE)
{

	header("location:exam.php?msg=1&Delete-Successful-Exam!");

}
else
{

	header("location:exam.php?msg=0&Delete-Fail!");

}

$conn->close();

?>