<?php
$cate_id = $_GET['cate_id'];

include '../db_config/connection.php';
$cate_id = $_REQUEST['cate_id'];
$sql = "DELETE FROM category WHERE cate_id='".$cate_id."'";
if ($conn->query($sql) === TRUE) {
header("location:categorys.php?msg=1");
} else {
header("location:categorys.php?msg=0");
}

$conn->close();

?>