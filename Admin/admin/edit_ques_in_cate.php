<?php
include 'check_login.php';
include 'count_records.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Question</title>
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
  <style type="text/css">
    p{
      color: black;
      font-size: 14px;
    }
  </style>
</head>
<body style="font-size: 12px">
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
                  <form action="ed_ques_in_cate.php" method="POST" accept-charset="utf-8">
                    <?php
                    include('../db_config/connection.php');
                    $ques_id = $_REQUEST['ques_id'];
                    $sql = mysqli_query($conn, "SELECT * FROM question WHERE ques_id = '".$ques_id."'");
                    if($row=mysqli_fetch_array($sql)){?>
                      <div style="float: left;">
                        <span class="table-title">QUESTION ID: <a href="javascript:history.back()"><strong><?php echo $ques_id; ?></strong></a></span>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="form-content" style="margin: 10px">
                    <?php
                    require '../db_config/connection.php';
                    $ques_id = $_REQUEST['ques_id'];
                    error_reporting(0);
                    $count = 1;
                    $sql = mysqli_query($conn, "SELECT * FROM question WHERE ques_id = '".$ques_id."'");
                    if($row=mysqli_fetch_array($sql)){?>
                      <div class="form-group">
                        <p>Question ID</p><input type="text" class="form-control" name="ques_id" value="<?php echo $row['ques_id'] ?>" readonly="true">
                      </div>
                      <div class="form-group">
                        <p>Content</p><textarea name="content" rows="5" cols="170" required placeholder="Content of Question"><?php echo $row['content'] ?></textarea>
                      </div>
                      <div class="form-group">
                        <p>Type</p>
                        <select class="form-control" name="type" required>
                          <option selected disabled value=""><?php echo $row['type'] ?></option>
                          <option value="Single Choice">Single Choice</option>
                          <option value="Multiple Choice">Multiple Choices</option>
                          <option value="Yes/No">Yes/No</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <p>Correct Answer</p> <input type="text" class="form-control" name="correct_ans" placeholder="Correct Answer"  value="<?php echo $row['correct_ans'] ?>" required>
                      </div>
                      <div class="form-group">
                        <p>A Answer</p> <input type="text" class="form-control" name="a_ans" placeholder="A answer" value="<?php echo $row['a_ans'] ?>">
                      </div>
                      <div class="form-group">
                        <p>B Answer</p> <input type="text" class="form-control" name="b_ans" placeholder="B Answer" value="<?php echo $row['b_ans'] ?>">
                      </div>
                      <div class="form-group">
                        <p>C Answer</p> <input type="text" class="form-control" name="c_ans" placeholder="C Answer" value="<?php echo $row['c_ans'] ?>">
                      </div>
                      <div class="form-group">
                        <p>D Answer</p> <input type="text" class="form-control" name="d_ans" placeholder="D Answer" value="<?php echo $row['d_ans'] ?>">
                      </div>
                      <div class="form-group">
                        <p>Mark</p> <input type="text" class="form-control" name="mark" placeholder="Mark" value="<?php echo $row['mark'] ?>" required>
                      </div>
                      <div class="form-group">
                        <p>Category</p> <input type="text" class="form-control" name="cate_id" placeholder="Category" value="<?php echo $row['cate_id'] ?>" readonly required>
                      </div>
                      <div class="box-footer clearfix">
                        <button type="submit" style="background-color: blue; color: white" class="pull-right btn btn-default" name="edit_question_in_cate" id="sendEmail"><h4>Update<i class="fa fa-arrow-circle-up"></i></h4>
                        </button>
                      </div>
                    <?php }?>
                  </form>
                </div>
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