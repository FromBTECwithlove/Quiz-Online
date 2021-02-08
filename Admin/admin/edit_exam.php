<?php
include 'check_login.php';
include 'count_records.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Update Exam</title>
  <meta http-equiv="refresh" content="180">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" href="url('https://fonts.googleapis.com/css?family=Montserrat');">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style-addnewquestion.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <link rel="stylesheet" href="../ckeditor/">
  <link rel="icon" href="../dist/img/icon.png">
  <link rel="stylesheet" href="../css/view_cate.css">
  <script src="js/extention/choices.js"></script>
  <script>
    const choices = new Choices('[data-trigger]', {
      searchEnabled: false,
      itemSelectText: '',
    });
  </script>
  <style>
    .form-group>span,textarea
    {
      font-size: 16px
    }
    .form-group>input[type="text"]
    {
      font-size: 14px;
    }
  </style>
</head>
<body >
  <div class="wrapper">
    <?php include('header.php') ?>
    <div>
      <div class="main-container">
        <div id="sidebar-container">
          <?php include('right_menu.php') ?>
        </div>
        <div class="main-wrapper">
          <div class="row">
            <div id="admin" class="table-wrapper">
              <div class="card material-table">
                <div class="table-header">
                  <form action="ed_exam.php" method="POST" accept-charset="utf-8">
                    <?php
                    include('../db_config/connection.php');
                    $exam_id = $_REQUEST['exam_id'];
                    error_reporting(0);
                    $sql = mysqli_query($conn, "SELECT * FROM exam WHERE exam_id = '".$exam_id."'");
                    if($row=mysqli_fetch_array($sql)){?>
                      <div style="float: left;">
                        <span class="table-title">Update Exam: <a href="exam.php" style="text-decoration: none;"><strong><?php echo "$exam_id"; ?></strong></a></span>
                      </div>
                    </div>
                    <div style="padding: 10px;">
                      <input hidden type="text" name="exam_id" value="<?php echo $row['exam_id'] ?>" readonly>
                      <div class="form-group">
                        <span>Title</span><input class="form-control" type="text" name="title" placeholder="Title of Exam" value="<?php echo $row['title'] ?>">
                      </div>
                      <div class="form-group">
                        <span>Date & Time</span><input class="form-control" type="text" name="title" placeholder="Title of Exam" value="<?php echo $row['date_time'] ?>">
                      </div>
                      <div class="form-group">
                        <span>Duration</span>
                        <input class="form-control" id="duration-input" type="text" name="duration" required pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" value="<?php echo $row['duration'] ?>" title="Write a duration in the format hh:mm:ss">
                      </div>
                      <div class="form-group">
                        <span>Type of Exam</span>
                        <select name="type" class="form-control" id="" required>
                          <option value="" selected disabled><?php echo $row['type']; ?></option>
                          <option value="Mid-term Test">Mid-term Test</option>
                          <option value="Final Test">Final Test</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <span>Faculty</span>
                        <input type="text" class="form-control" name="faculty_id" value="<?php echo $row['faculty_id'];?>">
                      </div>
                      <div class="box-footer clearfix">
                        <button onclick="confirmUpdate()" type="submit" class="btn btn-success" name="edit_exam" id="sendEmail"><h4>Update</h4></button>
                        <button type="button" class="btn btn-warning" name="" id="sendEmail"><a href="exam.php" style="text-decoration: none; color: black"><h4>Cancel</h4></a></button>
                        <script>
                          function confirmUpdate() {
                            var x = confirm('Click OK to continue!');
                            if (x) {
                              return true;
                            }
                            else
                              return false;
                          }
                        </script>
                      </div>
                    <?php } ?>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <?php
        include 'footer.php';
        ?>
      </footer>
    </div>

    <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../plugins/knob/jquery.knob.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../plugins/fastclick/fastclick.js"></script>
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/pages/dashboard.js"></script>
    <script src="../dist/js/demo.js"></script>
    <script src="../dist/js/bieudo.js"></script>
    <script src="../bootstrap/js/jquery.flot.js"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="../bootstrap/js/jquery.flot.resize.js"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="../bootstrap/js/jquery.flot.pie.js"></script>
  </body>

  </html>