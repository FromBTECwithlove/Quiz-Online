<?php
if(isset($_POST['edit_cate'])) {
	$cate_id = $_POST['cate_id'];
	$title = $_POST['cate_title'];
	$des = $_POST['cate_des'];
	include '../db_config/connection.php';
	$sql = "UPDATE `category` SET `cate_id`= '".$cate_id."',`cate_title`='".$title."',`cate_des`='".$des."' WHERE `cate_id` = '".$_REQUEST['cate_id']."'";
	if ($conn->query($sql) === TRUE) {
		header('location:categorys.php?messenger=1&Update-success-with&title="'.$title.'"&categoryID="'.$cate_id.'"');
	} else {
		$error = $conn->error;
		header("location:categorys.php?messenger=0&Updat-Fail&err=$error");
	}
	$conn->close();
}else{
	header("location:categorys.php");
}


?>