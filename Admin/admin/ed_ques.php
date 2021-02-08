<?php
if(isset($_POST['update_question'])) {
	$ques_id = $_POST['ques_id'];
	$content = $_POST['content'];
	$type = $_POST['type'];
	$correct_ans = $_POST['correct_ans'];
	$a_ans = $_POST['a_ans'];
	$b_ans = $_POST['b_ans'];
	$c_ans = $_POST['c_ans'];
	$d_ans = $_POST['d_ans'];
	$mark = $_POST['mark'];
	$cate_id = $_POST['cate_id'];
}else{
	header("location:questions.php");
}
include '../db_config/connection.php';
$qID = $_REQUEST['ques_id'];
$sql = "SELECT * FROM question WHERE ques_id = $qID";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc())
	{
		$ques_id = $_POST['ques_id'];
		$content = $_POST['content'];
		header('location:questions.php?msg=0&ques_id="'.$ques_id.'"&content="'.$content.'"');
	}
} else {
	include '../db_config/connection.php';
	$sql = "UPDATE `question` SET `ques_id`='".$ques_id."',`content`='".$content."',`type`='".$type."',`correct_ans`='".$correct_ans."',`a_ans`='".$a_ans."',`b_ans`='".$b_ans."',`c_ans`='".$c_ans."',`d_ans`='".$d_ans."',`mark`='".$mark."',`cate_id`='".$cate_id."' WHERE `ques_id` = '".$ques_id."'";
	if ($conn->query($sql) === TRUE) {
		header('location:questions.php?msg=1&ques_id="'.$ques_id.'"&content="'.$content.'"');
	} else {
		$error = $conn->error;
		header("location:questions.php?err=$error");
	}
	$conn->close();
}
$conn->close();

?>