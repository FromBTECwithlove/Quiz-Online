	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Create Exam</title>
	</head>
	<style>
    /* .modal-dialog{
        max-width: 450px;
        } */
        .add-exam-form {
        	padding: 15px 25px;
        }
        .add-exam-form input,
        .add-exam-form select{
        	width: 100%;
        	margin-top: 10px;
        	margin-bottom: 15px;
        	height: 38px;
        	border-radius: 5px;
        	border: 1px solid #CED4DA;
        }
        .add-exam-form span{
        	font-size: 16px;
        	font-weight: 700;
        }
        input[type="text"], select, input[type="datetime-local"]{
        	font-size: 12px;
        }
        .modal-content{
        }
      </style>
      <body>
       <div class="modal fade" id="create-exam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
        <div class="modal-content">
         <div class="modal-header">
          <h5 class="modal-title" id="" style="font-size: 20px; font-weight: 700">Create Exam</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-style: 20px">
           <span aria-hidden="true" >&times;</span>
         </button>
       </div>
       <form action="add_exam.php" method="POST">
        <div class="modal-body add-exam-form">
          <div>
            <span>Exam ID</span>
            <input type="text" name="exam_id" placeholder="ID">
          </div>
          <div>
            <span>Exam Title</span>
            <input type="text" name="title" required placeholder="Title">
          </div>
          <div>
            <span>Random Question In Categories</span>
            <select name="category">
              <?php
              include('../db_config/connection.php');
              $sql = mysqli_query($conn, "SELECT * FROM category");
              while ($row = mysqli_fetch_array($sql)) {?>
                <option value="<?php echo $row['cate_id'] ?>"><?php echo $row['cate_title']; ?></option>
              <?php }?>
            </select>
          </div>
          <div>
            <span>Type of Exam</span>
            <select name="type" id="" required>
             <option value="Mid-term Test">Mid-term Test</option>
             <option value="Final Test">Final Test</option>
           </select>
         </div>
         <div>
          <span>Faculty</span>
          <select name="faculty" required id="">
           <?php
           include('../db_config/connection.php');
           $sql = mysqli_query($conn, "SELECT * FROM faculty");
           while($row = mysqli_fetch_array($sql)){?>
            <option value="<?php echo $row['faculty_id'];?>"><?php echo $row['faculty_name']; ?></option>
          <?php }
          ?>
        </select>
      </div>
      <div>
        <span>Start Date-Time</span>
        <input type="datetime-local" required="" name="date_time">
      </div>
      <div>
        <span>Duration</span>
        <input id="duration-input" type="text" name="duration" required pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" value="00:00:00" title="Write a duration in the format hh:mm:ss">
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size: 16px">Close</button>
      <button type="submit" name="add-exam" class="btn btn-primary" style="font-size: 16px">Create Exam</button>
    </div>
  </form>

</div>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>

</html>