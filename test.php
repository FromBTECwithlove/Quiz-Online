<?php
require_once("Admin/db_config/connection.php");
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title> Previous and Next page buttons in PHP website with MYSQL database</title>
</head>
<body>
	<?php
	$result = mysqli_query($conn, "SELECT * FROM ques_exam WHERE id=$id");

	if($row = mysqli_fetch_array($result))
	{
		$exam_id = $row['exam_id'];
		$ques_id = $row['ques_id'];
		$id = $row['id'];

		$result1 = mysqli_query($conn, "SELECT question.*,ques_exam.exam_id FROM question INNER JOIN ques_exam ON question.ques_id = ques_exam.ques_id WHERE question.ques_id=$ques_id");
			// $result1 = mysqli_query($conn, "SELECT `question`.*,`exam`.* FROM ques_exam
			// INNER JOIN `question` ON `question`.`ques_id` = `ques_exam`.`ques_id`
			// INNER JOIN `exam` ON `exam`.`exam_id` = `ques_exam`.`exam_id`
			// WHERE `ques_exam`.`exam_id`='".$_GET['exam_id']."'");
		$row1=mysqli_fetch_array($result1);

	}
	?>

	<!-- <p>Question ID: <?php echo $ques_id;?></p> -->
	<?php
	if ($row1['type'] == "Single Choice") {?>
		<form action="" method="POST">
			<h1> <?php echo $exam_id;?></h1>
			<h2>Question <?php echo $id ?> - Mark: <?php echo $row1['mark']; ?></h2>
			<p><?php echo $row1['content']; ?></p>
			<p>
				<input type="radio" name="ans" value="a_ans"> A. <?php echo $row1['a_ans']; ?>
			</p>
			<p>
				<input type="radio" name="ans" value="b_ans"> B. <?php echo $row1['b_ans']; ?>
			</p>
			<p>
				<input type="radio" name="ans" value="c_ans"> C. <?php echo $row1['c_ans']; ?>
			</p>
			<p>
				<input type="radio" name="ans" value="d_ans"> D. <?php echo $row1['d_ans']; ?>
			</p>
		</form>

		<?php
	}
	elseif($row1['type'] == "Multiple Choices")
		{?>
			<form action="" method="POST">
				<h1> <?php echo $exam_id;?></h1>
				<h2>Question <?php echo $id ?> - Mark: <?php echo $row1['mark']; ?></h2>
				<p><?php echo $row1['content']; ?></p>
				<p>
					<input type="checkbox" name="ans" value="a_ans"> A. <?php echo $row1['a_ans']; ?>
				</p>
				<p>
					<input type="checkbox" name="ans" value="b_ans"> B. <?php echo $row1['b_ans']; ?>
				</p>
				<p>
					<input type="checkbox" name="ans" value="c_ans"> C. <?php echo $row1['c_ans']; ?>
				</p>
				<p>
					<input type="checkbox" name="ans" value="d_ans"> D. <?php echo $row1['d_ans']; ?>
				</p>
			</form>
			<?php
		}
		else{?>
			<form action="" method="POST">
				<h1> <?php echo $exam_id;?></h1>
				<h2>Question <?php echo $id ?> - Mark: <?php echo $row1['mark']; ?></h2>
				<p><?php echo $row1['content']; ?></p>
				<p>
					<input type="radio" name="ans" value="a_ans"> A. <?php echo $row1['a_ans']; ?>
				</p>
				<p>
					<input type="radio" name="ans" value="b_ans"> B. <?php echo $row1['b_ans']; ?>
				</p>
			</form>
			<?php
		}
		?>
		<div class="group">
			<?php
			// Previous button
			$previous= mysqli_query($conn, "SELECT * FROM ques_exam WHERE id<$id order by id DESC");

			if($row = mysqli_fetch_array($previous))
			{

				echo '<a href="test.php?id='.$row['id'].'"><button type="button">Previous</button></a>';
			}
			// Next button
			$next = mysqli_query($conn, "SELECT * FROM ques_exam WHERE id>$id order by id ASC");
			if($row = mysqli_fetch_array($next))
			{

				echo '<a href="test.php?id='.$row['id'].'"><button type="button">Next</button></a>';
			}

			?>
		</div>

	</body>
	</html>