<?php
include 'check_login.php';
include 'count_records.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit student</title>
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
  <link rel="stylesheet" href="style-addnewstudenttion.css">
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
                <div style="padding: 10px">
                  <div class="table-header">
                    <?php
                    include('../db_config/connection.php');
                    $student_id = $_REQUEST['student_id'];
                    $sql = mysqli_query($conn, "SELECT * FROM student WHERE student_id = '".$student_id."'");
                    if($row=mysqli_fetch_array($sql)){?>
                      <div style="float: left;">
                        <span class="table-title">STUDENT ID: <a href="javascript:history.back()"><strong><?php echo $student_id; ?></strong></a></span>
                      </div>
                    <?php } ?>
                  </div>
                  <form action="ed_std.php" method="post">
                    <?php
                    include('../db_config/connection.php');
                    $student_id = $_REQUEST['student_id'];
                    $sql = mysqli_query($conn, "SELECT * FROM student WHERE student_id = '".$student_id."'");
                    while($row=mysqli_fetch_array($sql)){?>
                      <div class="form-group">
                        <input type="text" hidden class="form-control" name="student_id" value="<?php echo $row['student_id'] ?>" readonly="true">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="student_name" placeholder="Student Name" value="<?php echo $row['student_name'] ?>" required>
                      </div>
                      <div class="form-group">
                        <input type="date" class="form-control" name="student_DoB"  value="<?php echo $row['student_DoB'] ?>" required>
                      </div>
                      <div class="form-group">
                        <select class="form-control" name="student_gender" required>
                          <option value="" disabled>Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" name="student_email" placeholder="Student Email"  value="<?php echo $row['student_email'] ?>" required>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="student_address" placeholder="Student Address" value="<?php echo $row['student_address'] ?>" required>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="student_phone" placeholder="Student Phone" value="<?php echo $row['student_phone'] ?>" required>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="student_password" placeholder="Student Password" value="<?php echo $row['student_password'] ?>" required>
                      </div>
                      <div class="box-footer clearfix">
                        <button type="submit" style="background-color: yellow; color: black" class="pull-right btn btn-default" name="edit_student" id="sendEmail"><h4>Update<i class="fa fa-arrow-circle-up"></i></h4>
                        </button>
                      </div>
                    <?php }?>
                  </form>
                  <div class="box-footer clearfix">
                    <button type="" style="background-color: #F30930; margin: -11px 5px 0 0;" class="pull-right btn btn-default" name="" id="sendEmail"><a href="students.php" style="color: white"><h4>Cancel</h4></a>
                    </button>
                  </div>
                </div>
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
<!-- 
<div class="modal fade" id="add-student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="top: 200px" role="document">
    <div class="modal-content modal-content-width" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-body-add-new-student">
        <div class="addstudent-container">
          <div class="table-header">
            <?php
            include('../db_config/connection.php');
            $student_id = $_REQUEST['student_id'];
            $sql = mysqli_query($conn, "SELECT * FROM student WHERE student_id = '".$student_id."'");
            if($row=mysqli_fetch_array($sql)){?>
              <div style="float: left;">
                <span class="table-title">STUDENT ID: <a href="javascript:history.back()"><strong><?php echo $student_id; ?></strong></a></span>
              </div>
            <?php } ?>
          </div>
          <form action="ed_std.php" method="post">
            <?php
            include('../db_config/connection.php');
            $student_id = $_REQUEST['student_id'];
            $sql = mysqli_query($conn, "SELECT * FROM student WHERE student_id = '".$student_id."'");
            while($row=mysqli_fetch_array($sql)){?>
              <div class="form-group">
                <input type="text" class="form-control" name="student_id" value="<?php echo $row['student_id'] ?>" readonly="true">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="student_name" placeholder="Student Name" value="<?php echo $row['student_name'] ?>" required>
              </div>
              <div class="form-group">
                <input type="date" class="form-control" name="student_DoB"  value="<?php echo $row['student_DoB'] ?>" required>
              </div>
              <div class="form-group">
                <select class="form-control" name="student_gender" required>
                  <option value="" disabled>Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="student_email" placeholder="Student Email"  value="<?php echo $row['student_email'] ?>" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="student_address" placeholder="Student Address" value="<?php echo $row['student_address'] ?>" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="student_phone" placeholder="Student Phone" value="<?php echo $row['student_phone'] ?>" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="student_password" placeholder="Student Password" value="<?php echo $row['student_password'] ?>" required>
              </div>
              <div class="box-footer clearfix">
                <button type="submit" style="background-color: yellow; color: black" class="pull-right btn btn-default" name="edit_student" id="sendEmail"><h4>Update<i class="fa fa-arrow-circle-up"></i></h4>
                </button>
              </div>
            <?php }?>
          </form>
          <div class="box-footer clearfix">
            <button type="" style="background-color: #F30930; margin: -11px 5px 0 0;" class="pull-right btn btn-default" name="" id="sendEmail"><a href="students.php" style="color: white"><h4>Cancel</h4></a>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  .modal-footer{
    max-width: 30%;
    float: right;
  }
  .modal-footer button{
    padding: 5px;
    font-size: 12px;
    width: 70px;
  }
  div#position{
    top:400px !important;
  }
  .modal-header{
    height: 55px;
  }
  .modal-header h5{
    font-weight: 700 !important;
    font-size: 20px !important;
    padding-top: 2px;
  }
  .modal-body-add-new-student{
    /*padding: 20px 40px !important;*/
  }
  .modal-content{
    width: 130% !important;
    right: 15%; 
  }
  .addstudent-container form{
    left: -20px !important;
    width: 100%;
  }
  .addstudent-container table{
    width:100%;
    margin-left: 17px;
    color: black;

    text-align: center;
  }

  .add{
    padding-left: 40px;
    padding-right: 15px;
    width: 100%;
    height: auto;
    margin: auto;
    color: black;
    text-align: left;
  }
  .add select{
    width: 99.5%;
  }
  .add th{
    padding-bottom: 10px;
  }
  .add th span{
    float: left;
    font-size: 14px;
  }
  .add th div label{
    font-size: 14px;
    margin-top: 2px;
    font-weight: 100;
  }
  .add input{
    width: 90%;
    padding: 3px 5px;
    margin: 5px 0;
    box-sizing: border-box;
    border: 1px solid #000;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
    border-radius: 5px;

  }

  .add input[type=text]:focus {
    border: 1px solid #58257b;
  }       

  .add textarea{
    width: 190%;
    height: 60px;
    border-radius: 5px;
    margin-bottom: 10px;
  }
  .add th div{
    display: flex;
    width: 60%;
    margin: 10px 0 0 -15px;

  }
  .add th div input{
    margin-top: 5px;
  }
  .nofication h4{
    text-align: center;
    padding-right: 10px: 
  }
  .modal-footer{
    width: 100%;
  }
</style> -->