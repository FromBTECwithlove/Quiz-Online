<?php
if(isset($_POST['edit_question_in_cate'])) {
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
	header("location:categorys.php");
}
include '../db_config/connection.php';
$quesID = $_REQUEST['ques_id'];
$sql = "SELECT * FROM question INNER JOIN category ON `question`.ques_id = `category`.cate_id WHERE ques_id = $quesID";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc())
	{
		$cate_id = $_POST['cate_id'];
		$content = $_POST['content'];
		header('location:categorys.php?msg=0&cate_id="'.$cate_id.'"&question="'.$content.'"');
	}
} else {
	include '../db_config/connection.php';
	$sql = "UPDATE `question` SET `ques_id`='".$ques_id."',`content`='".$content."',`type`='".$type."',`correct_ans`='".$correct_ans."',`a_ans`='".$a_ans."',`b_ans`='".$b_ans."',`c_ans`='".$c_ans."',`d_ans`='".$d_ans."',`mark`='".$mark."',`cate_id`='".$cate_id."' WHERE `ques_id` = '".$ques_id."'";
	if ($conn->query($sql) === TRUE) {
		header('location:categorys.php?msg=1&cate_id="'.$cate_id.'"&question="'.$content.'"');
	} else {
		$error = $conn->error;
		header("location:categorys.php?err=$error");
	}
	$conn->close();
}
$conn->close();

?>