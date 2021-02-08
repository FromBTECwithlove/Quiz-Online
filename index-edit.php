<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exam_online";
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
	die("Error connection: " . $conn->connect_error);
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<div>
		<?php
		if (isset($_POST['click']) || isset($_GET['start']))
		{
			@$_SESSION['clicks'] += 1 ;
			$c = $_SESSION['clicks'];
			if(isset($_POST['userans']))
			{
				$userselected = $_POST['userans'];
				$fetchqry2 = "UPDATE `question` SET `userans`='$userselected' WHERE `ques_id`=$c-1";
				$result2 = mysqli_query($conn,$fetchqry2);
			}
			if (isset($_POST['userans-mc'])) {
				$us_mc = $_POST['userans-mc'];
				$ck = "";
				foreach ($us_mc as $as) {
					$ck .= $as.",";
				}
				$sql = "UPDATE `question` SET `userans`='$ck' WHERE `ques_id`=$c-1";
				$rs = mysqli_query($conn,$sql);
			}
		}
		else
		{
			$_SESSION['clicks'] = 0;
		}
		echo($_SESSION['clicks']);
		?>
	</div>
	<form accept-charset="utf-8">
		<?php
		if($_SESSION['clicks']==0){ ?>
			<div>
				<span>Exam ID</span><br>
				<input type="text" name="exam_id" required placeholder="Enter ID of Exam" value="">
			</div>
			<div>
				<span>Student ID</span><br>
				<input type="text" name="student_id" required placeholder="Enter ID Student" value="">
			</div>
			<div>
				<button type="" class="button" name="start">Start</button>
			</div>
		<?php } ?>
	</form>
	<form action="" method="POST" accept-charset="utf-8">
		<table>
			<?php
			if (isset($c))
			{
				$sql = "SELECT `exam`.`exam_id`, `exam`.`type`, `exam`.`title`, `exam`.`create_date`, `exam`.`date_time`, `exam`.`duration`, `exam`.`faculty_id`, `question`.`ques_id`, `question`.`content`, `question`.`type`, `question`.`correct_ans`, `question`.`a_ans`, `question`.`b_ans`, `question`.`c_ans`, `question`.`d_ans`, `question`.`mark`, `question`.`cate_id`, `question`.`userans`
				FROM `ques_exam`
				INNER JOIN `question` ON `ques_exam`.`ques_id` = `question`.`ques_id`
				INNER JOIN `exam` ON `ques_exam`.`exam_id` = `exam`.`exam_id`
				WHERE `ques_exam`.`exam_id` = '".$_REQUEST['exam_id']."' AND `ques_exam`.`id`='".$c."'";
				$result = mysqli_query($conn,$sql);
				$num=mysqli_num_rows($result);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				?>
				<tr>
					<td>
						<h3>
							<?php echo "<b>Question ".$c.":</b><br>".@$row['content']; ?>
						</h3>
					</td>
				</tr>
				<?php
				if($_SESSION['clicks'] > 0 && $_SESSION['clicks'] <= 18)
				{
					if ($row['type']=="Single Choice") {?>
						<tr><td><input type="radio" name="userans" required value="A">&nbsp;A. <?php echo $row['a_ans']; ?></td></tr>
						<tr><td><input type="radio" name="userans" value="B">&nbsp;B. <?php echo $row['b_ans']; ?></td></tr>
						<tr><td><input type="radio" name="userans" value="C">&nbsp;C. <?php echo $row['c_ans']; ?></td></tr>
						<tr><td><input type="radio" name="userans" value="D">&nbsp;D. <?php echo $row['d_ans']; ?></td></tr>
						<tr><td><button class="button3" name="click" >Next</button></td></tr>
					<?php }elseif ($row['type']=="True / False") {?>
						<tr><td><input type="radio" name="userans" required value="A">&nbsp;A. <?php echo $row['a_ans']; ?></td></tr>
						<tr><td><input type="radio" name="userans" value="B">&nbsp;B. <?php echo $row['b_ans']; ?></td></tr>
						<tr><td><button class="button3" name="click" >Next</button></td></tr>
					<?php }elseif ($row['type']=="Multiple Choices") {?>
						<tr><td><input type="checkbox" name="userans-mc[]" value="A">&nbsp;A. <?php echo $row['a_ans']; ?></td></tr>
						<tr><td><input type="checkbox" name="userans-mc[]" value="B">&nbsp;B. <?php echo $row['b_ans']; ?></td></tr>
						<tr><td><input type="checkbox" name="userans-mc[]" value="C">&nbsp;C. <?php echo $row['c_ans']; ?></td></tr>
						<tr><td><input type="checkbox" name="userans-mc[]" value="D">&nbsp;D. <?php echo $row['d_ans']; ?></td></tr>
						<tr><td><button class="button3" name="click" >Next</button></td></tr>
					<?php } } } ?>
				</table>
			</form>
			<?php
			if($_SESSION['clicks']>18)
			{
				$qry3 = "SELECT `userans`, `correct_ans` FROM `question`;";
				$result3 = mysqli_query($conn,$qry3);
				$storeArray = Array();
				while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
					if($row3['correct_ans']==$row3['userans']){
						@$_SESSION['score'] += 1 ;
					}
				}
				?>
				<h2>Result</h2>
				<span>Number of Correct Answer:&nbsp;<?php echo $no = @$_SESSION['score'];session_unset(); ?></span><br>
				<span>Your Score:&nbsp; <?php echo $no*2; session_destroy();?></span>
			<?php } ?>
		</body>
		</html>