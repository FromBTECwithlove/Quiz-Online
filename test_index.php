  <?php
  require_once("Admin/db_config/connection.php");
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title>Next and Previous Buttons in PHP website - Techno Smarter</title>
  </head>
  <body>
  	<h1>Website pages in List </h1>
  	<?php
  	$result = mysqli_query($conn, "SELECT * FROM ques_exam ORDER BY id ASC");
  	while($row = mysqli_fetch_array($result)) {


  		echo '<li><a href="test.php?id='.$row['id'].'&exam_id='.$row['exam_id'].'">'.$row['id'].'-'.$row['exam_id'].'-'.$row['ques_id'].'</a></li>';


  		echo "<hr>";

  	}


  	?>

  </body>
  </html>