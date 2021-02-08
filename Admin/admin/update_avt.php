<?php
include 'check_login.php';
if(isset($_POST['uplogo'])) {
$image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
}else{
	header("location:./");
}

include '../db_config/connection.php';

$sql = "UPDATE tinhtv_admin SET img_dd='$image' where id ='$current_id'";

if ($conn->query($sql) === TRUE) {
    header("location:./");
} else {
$error = $conn->error;
   header("location:./?err2=$error");
}

$conn->close();
?>