<?php
if (isset($_POST['login'])) {
	include 'dbconfig.php';
	$email = $_POST['student_email'];
	$pass = $_POST['student_password'];
	if ($email=="admin"||$email=="Tinhtvbhaf180186@fpt.edu.vn") {
		// header("location:index.php?login_err=Username or password is incorrect!");
	}
	$sql = mysqli_query($conn, "SELECT * FROM student WHERE student_email ='$email' AND student_password='$pass'");

	if ($sql->num_rows > 0) {
		while($row = $sql->fetch_assoc()) {
			$user_role = $row['permission'];
			$fullname = $row['student_name'];
			if ($user_role == "1") {
				setcookie(loggedin, date("F jS - g:i a"), $seconds);
				session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $email;
				$_SESSION['fullname'] = $fullname;
				header("location:../admin/");
			}elseif ($user_role == "3"){
				setcookie(loggedin, date("F jS - g:i a"), $seconds);
				session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $email;
				$_SESSION['fullname'] = $fullname;
				header('location:entercode-1.php?page=Do_exam-quiz-online&username='.$email.'');
				// header("location:test_index.php");
			}
			else{
				echo "<script>alert('Error');</script>";
			}
		}
	}
	else {
		header("location:index.php?login_err=Username or password is incorrect!");
	}
}
?>