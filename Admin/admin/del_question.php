<?php
include '../db_config/connection.php';
$ques_id = $_REQUEST['ques_id'];
$query = mysqli_query($conn, "DELETE FROM ques_exam WHERE ques_id = '".$ques_id."'");
$sql = mysqli_query($conn, "DELETE FROM question WHERE ques_id= '".$ques_id."'");
if (($query&&$sql) === TRUE) {
header("location:questions.php?msg=1&Detele-successful-question");
} else {
header("location:questions.php?msg=0&Delete-Fail");
}

$conn->close();

?>