<?php
include('dbconfig.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quiz Online - BTEC FPT</title>
</head>
<body>

	<form action="do_exam.php?page=do-exam" method="POST" accept-charset="utf-8">
		<?php
		$username = $_REQUEST['username'];
		$query = mysqli_query($conn, "SELECT * FROM student WHERE student_email = '$username'");
		if ($std_row = mysqli_fetch_array($query)) {?>
			<div>
				<span>Student ID: </span>
				<input type="text" name="student_id" value="<?php echo $std_row['student_id']; ?>">
			</div>
			<div>
				<span>Student Name: </span>
				<input type="text" name="student_name" value="<?php echo $std_row['student_name']; ?>">
			</div>
		<?php } ?>
		<div>
			<input type="text" name="exam" value="" placeholder="Enter the code of exam here..." required>
		</div>
		<div>
			<input type="submit" name="submit" value="Start">
		</div>
		<div>
			<input type="text" name="id" value="1" hidden>
		</div>
	</form>
	<!-- <div class="group">
		<?php
		include_once 'dbconfig.php';
		$id = $_GET['id'];
		$previous= mysqli_query($conn, "SELECT `question`.*, `exam`.* FROM ques_exam
			INNER JOIN `question` ON `question`.`ques_id`=`ques_exam`.`ques_id`
			INNER JOIN `exam` ON `exam`.`exam_id` = `ques_exam`.`exam_id`
			WHERE id<$id ORDER BY id DESC");
		if($row = mysqli_fetch_array($previous))
		{
			echo '<a href="?page=Do_exam-quiz-online&username='.$_GET['username'].'&id='.$row['id'].'"><button type="button">Prev</button></a>';
		}
		$next = mysqli_query($conn, "SELECT `question`.*, `exam`.*,`ques_exam`.* FROM ques_exam
			INNER JOIN `question` ON `question`.`ques_id`=`ques_exam`.`ques_id`
			INNER JOIN `exam` ON `exam`.`exam_id` = `ques_exam`.`exam_id`
			WHERE id>$id ORDER BY id ASC");
		if($row = mysqli_fetch_array($next))
		{
			echo '<a href="quiz_online.php?page=Do_exam-quiz-online&username='.$_GET['username'].'&id='.$row['id'].'"><button type="button">Next</button></a>';
		}

		?>
	</div>
 -->
</body>
</html>