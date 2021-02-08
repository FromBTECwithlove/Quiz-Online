<?php
if(isset($_POST['add_cate'])) {
	$cate_id = $_POST['cate_id'];
	$cate_title = $_POST['cate_title'];
	$cate_des = $_POST['cate_des'];
	include '../db_config/connection.php';
	$sql = "SELECT * FROM category WHERE cate_id = $cate_id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$cate_id = $row['cate_id'];
			$cate_title = $row['cate_title'];
			$cate_des = $row['cate_des'];
			header('location:categorys.php?messenger=0&Add-Fail&title="'.$cate_title.'"&id="'.$cate_id.'"');
		}
	}
	else
	{
		include '../db_config/connection.php';
		$sql = "INSERT INTO `category`(`cate_id`, `cate_title`, `cate_des`) VALUES ('$cate_id','$cate_title','$cate_des')";
		if ($conn->query($sql) === TRUE)
		{
			header('location:categorys.php?messenger=1&Add-Successful-with&title="'.$cate_title.'"');
		}
		else
		{
			$error = $conn->error;
			header("location:categorys.php?Add-Fail&err=$error");
		}
		$conn->close();
	}
}else{
	header("location:categorys.php");
}
$conn->close();

?>


