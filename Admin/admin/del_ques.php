<?php
include '../db_config/connection.php';
$ques_id = $_REQUEST['ques_id'];
$sql = "DELETE FROM question WHERE ques_id='".$ques_id."'";
if ($conn->query($sql) === TRUE) {
header("location:categorys.php");
} else {
header("location:categorys.php");
}

$conn->close();

?>