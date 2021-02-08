<?php
if(isset($_POST['add_ques'])) {
	include '../db_config/connection.php';
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
	include '../db_config/connection.php';
	$sql = "INSERT INTO `question` VALUES ('$ques_id','$content','$type','$correct_ans','$a_ans','$b_ans','$c_ans','$d_ans','$mark','$cate_id')";
	if ($conn->query($sql) === TRUE) {
		header('location:categorys.php?messenger=1&Add-Successful&ques_id="'.$ques_id.'"&content="'.$content.'"');
	} else {
		$error = $conn->error;
		header("location:categorys.php?messenger=0&err=$error");
	}
	$conn->close();
}elseif(isset($_POST['add_ques-2'])) {
	include '../db_config/connection.php';
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
	$ck = "";
	foreach ($correct_ans as $cr) {
		$ck .= $cr.",";
	}
	include '../db_config/connection.php';
	$sql1 = mysqli_query($conn, "INSERT INTO `question` VALUES ('$ques_id','$content','$type','$ck','$a_ans','$b_ans','$c_ans','$d_ans','$mark','$cate_id')");
	if ($sql1 === TRUE) {
		header('location:categorys.php?messenger=1&ques_id="'.$ques_id.'"&content="'.$content.'"');
	}else{
		$error = $conn->error;
		header('location:categorys.php?messenger=0&err="'.$error.'"');
	}$conn->close();
}
else{
	header("location:./");
}
$conn->close();

?>