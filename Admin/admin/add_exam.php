<?php
if (isset($_POST['add-exam']))
{
	$exam_id = $_POST['exam_id'];
	$title = $_POST['title'];
	$type = $_POST['type'];
	$faculty = $_POST['faculty'];
	$date_time = $_POST['date_time'];
	$duration = $_POST['duration'];
	$category = $_POST['category'];
	include('../db_config/connection.php');
	$sql = mysqli_query($conn, "INSERT INTO `exam`(`exam_id`, `title`, `create_date`, `date_time`, `duration`, `type`, `faculty_id`) VALUES ('$exam_id','$title',now(),'$date_time','$duration','$type','$faculty')");
	// if ($sql === TRUE) {
	// 	// header('location:exam.php?msg=1&Add-Successful-Exam-with&exam_id='.$exam_id.'');
	// }

	/*----------------------------------------------------------------------------*/

	/*function getQuestionByType($questionType, $cate)
	{
		include '../db_config/connection.php';
		$listQuestion = array();
		$sql = "SELECT * FROM question WHERE type = '".$questionType."' AND cate_id= ".$cate."";
		$result = mysqli_query($conn, $sql);
		while ($row=mysqli_fetch_array($result))
		{
			array_push($listQuestion, $row['ques_id']);
		}
		return $listQuestion;
	}


	function randomQuestion($numberOfQuestion)
	{
		$category = $_POST['category'];
		$list0 = getQuestionByType("Single Choice",$category);
		$list1 = getQuestionByType("Multiple Choices",$category);
		$list2 = getQuestionByType("True / False",$category);
		$List_rand = array();
		$count = 0;
		while ($count < $numberOfQuestion)
		{
			$tmp0 = $list0[array_rand($list0)];
			$tmp1 = $list1[array_rand($list1)];
			$tmp2 = $list2[array_rand($list2)];
			if (!in_array($tmp2, $List_rand))
			{
				array_push($List_rand, $tmp2);
				$count ++;
			}
			elseif (!in_array($tmp1, $List_rand))
			{
				array_push($List_rand, $tmp1);
				$count ++;
			}
			elseif (!in_array($tmp0, $List_rand))
			{
				array_push($List_rand, $tmp0);
				$count ++;
			}
		}
		return $List_rand;
	}

	--------------------------------------------------------

	if ($_POST['type']==="Mid-term Test"&&$sql===TRUE) {
		$lr = randomQuestion(30);
		$exam_id = $_POST['exam_id'];
		$count = 0 ;
		for ($a = $count; $a < 30; $a++)
		{
			// include('../db_config/connection.php');
			// $query = mysqli_query($conn, "INSERT INTO `ques_exam`(`exam_id`, `ques_id`) VALUES('$exam_id','$lr[$a]')");
			// if ($query === TRUE) {
			// 	header('location:exam.php?msg=1&Add-Successful-Exam-with&exam_id='.$exam_id.'');
			// }
			echo $count.". ".$lr[$a]."<br>";
			$sql = mysqli_query($conn, "INSERT INTO `ques_exam`(`exam_id`, `ques_id`) VALUES('$exam_id','$lr[$a]')");
			if ($sql === TRUE){
				header('location:exam.php?msg=1&Add-Successful-Exam-with&exam_id='.$exam_id.'');
			}
			$count ++;
		}
	}elseif ($_POST['type']==="Final Test"&&$sql===TRUE) {
		$lr = randomQuestion(15);
		$exam_id = $_POST['exam_id'];
		$count = 0 ;
		for ($a = $count; $a < 15; $a++)
		{
			echo $count.". ".$lr[$a]."<br>";
			$sql = mysqli_query($conn, "INSERT INTO `ques_exam`(`exam_id`, `ques_id`) VALUES('$exam_id','$lr[$a]')");
			if ($sql === TRUE){
				header('location:exam.php?msg=1&Add-Successful-Exam-with&exam_id='.$exam_id.'');
			}
			$count ++;
		}
	}*/

	/*-----------------------------------------*/

	function randomQuestion($questionType, $cate, $numberOfQuestion)
	{
		include '../db_config/connection.php';
		$list_Q = array();
		$sql = "SELECT * FROM question WHERE type = '".$questionType."' AND cate_id= ".$cate."";
		$result = mysqli_query($conn, $sql);
		while ($row=mysqli_fetch_array($result))
		{
			array_push($list_Q, $row['ques_id']);
		}
		return $list_Q;
		/*--------------------*/
		$list_Rand = array();
		$count = 0;
		while ($count < $numberOfQuestion)
		{
			$tmp = $list_Q[array_rand($list_Q)];
			if (!in_array($tmp, $list_Rand))
			{
				array_push($list_Rand, $tmp);
				$count++;
			}
			else
			{
				header('location:exam.php?msg=0&Add-Fail');
			}
		}
		return $list_Rand;
	}
	if ($_POST['type']==="Mid-term Test"&&$sql===TRUE)
	{
		$lr = randomQuestion("True / False",$category,5);
		$lr1 = randomQuestion("Single Choice",$category,6);
		$lr2 = randomQuestion("Multiple Choices",$category,7);
		$exam_id = $_POST['exam_id'];
		$count = 1;
		for ($a = 0; $a < 5; $a++)
		{
			$query = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr[$a]','$count')");
			// $query1 = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr1[$a]')");
			// $query2 = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr2[$a]')");
			$count ++;
		}
		for ($b = 0; $b < 6; $b++)
		{
			// $query = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr[$a]')");
			$query1 = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr1[$b]','$count')");
			// $query2 = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr2[$a]')");
			$count ++;
		}
		for ($c = 0; $c < 7; $c++)
		{
			// $query = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr[$a]')");
			// $query1 = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr1[$a]')");
			$query2 = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr2[$c]','$count')");
			$count ++;
		}
		if (($query&&$query1&&$query2)===TRUE) {
			header('location:exam.php?msg=1&Add-Successful-Exam-with&exam_id="'.$exam_id.'"&title='.$title.'');
		}
	}
	elseif ($_POST['type']==="Final Test"&&$sql===TRUE)
	{
		$kount = 1;
		$lr = randomQuestion("True / False",$category,8);
		$lr1 = randomQuestion("Single Choice",$category,9);
		$lr2 = randomQuestion("Multiple Choices",$category,10);
		$exam_id = $_POST['exam_id'];
		for ($a = 0; $a < 8; $a++)
		{
			$query = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr[$a]','$kount')");
			// $query1 = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr1[$a]')");
			// $query2 = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr2[$a]')");
			$kount ++;
		}
		for ($a = 0; $a < 9; $a++)
		{
			// $query = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr[$a]')");
			$query1 = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr1[$a]','$kount')");
			// $query2 = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr2[$a]')");
			$kount ++;
		}
		for ($a = 0; $a < 10; $a++)
		{
			// $query = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr[$a]')");
			// $query1 = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr1[$a]')");
			$query2 = mysqli_query($conn, "INSERT INTO ques_exam VALUES ('$exam_id','$lr2[$a]','$kount')");
			$kount ++;
		}
		if (($query&&$query1&&$query2)===TRUE) {
			header('location:exam.php?msg=1&Add-Successful-Exam-with&exam_id="'.$exam_id.'"&title='.$title.'');
		}
	}
	else
	{
		$error = $conn->error;
		header('location:exam.php?msg=0&err="'.$error.'"');
	}
	$conn->close();
}
else
{
	header('location:./');
}
$conn -> close();

?>