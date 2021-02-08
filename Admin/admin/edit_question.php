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
    html{
      font-size: 16px !important;
    }

    .modal-title{
      color: #006077;
      font-weight: 700;
    }
    .modal-dialog{
      max-width: 600px !important;
    }
    .hidden-form-container{
      display: none;
    }
    .dropdown-menu .dropdown-menu-right button.active{
      background-color: white;
    }
    .hidden-form-container .active{
      display: block;
    }
    .btn-show-name{
      min-width: 150px !important;
    }
    .dropdown-item{
      width: 150px !important;
    }
    .dropdown-menu{
      min-width: 100px;
    }
    .btn-choice:hover{
      background-color: #CED4DA;
    }
    /*-------------------------------------------------*/
    .ques-table-footer{
      width: 100px;
      padding: 7px 0px;
      text-align:center;
      margin:10px;
      background-color: #0090B3;
      border-radius: 10px;
      font-size: 18px;
      font-weight: 700;
    }
    .ques-table-footer:hover{
      background-color: #007A99;
    }
    .ques-table-footer a{
      color: white;
    }
    .ques-table-footer a:hover{
      text-decoration: none;
    }
    .form-group p{
      font-weight: 700;
    }
    .form-group textarea{
      width: 100%;
    }
    .add-container{
      position: relative;
    }
    .btn-group{
      position: absolute;
      left:100px;
      top: -6px;
    }
    .btn-show-name{
      background-color: #0090B3;
    }
    .btn-show-name span{
      font-weight: 500;
    }
    .btn-secondary:not(:disabled):not(.disabled).active, .btn-secondary:not(:disabled):not(.disabled):active, .show>.btn-secondary.dropdown-toggle{
      background-color: #006077;
    }
    .dropdown-item.active, .dropdown-item:active{
      background-color: #0090B3;
    }
    .drop-button{
      margin-left: 0px;
    }
    .btn-show-name:hover{
      background-color: #006077;
    }
    #input-ans{
      flex: 1;
      height: 38px;
      border-radius: 5px;
      border:1px solid #CED4DA;
      margin-left: 10px;
    }
    .answer-form{
      display: flex;
    }
    .answer-form span{
      margin-top: 5px;
    }
    .answer-form label{
      flex: 1;
      display: flex;
      justify-content: space-between;
    }
    #option-1,#option-2,#option-3,#option-4{
      opacity: 0;
      position: absolute;
      left: 5px;
    }
    #option-tf-1,#option-tf-2{
      opacity: 0;
      position: absolute;
      left: 5px;
    }
    #option-mc-1,#option-mc-2,#option-mc-3,#option-mc-4{
      opacity: 0;
      position: absolute;
      left: 5px;
    }
    .form-sc, .form-tf, .form-mc label{
      position: relative;
    }
    .fas.fa-check-circle{
      font-size: 24px;
      margin-top: 5px;
      margin-right: 10px;
    }
    .fas.fa-check-square{
      font-size: 24px;
      margin-top: 5px;
      margin-right: 10px;
    }
    .btn-radio{
      color: #6C757D;
    }
    #option-1:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-2:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-3:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-4:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-tf-1:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-tf-2:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-mc-1:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-mc-2:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-mc-3:checked +.btn-radio{
      color: #5DE2A5;
    }
    #option-mc-4:checked +.btn-radio{
      color: #5DE2A5;
    }
    .add-ques-footer{
      float: right;
    }
    .btn-create:hover{
      background-color: #006077;
    }
    .btn-create{
      background-color: #0090B3;
    }
    .correct_answer{
      margin-top: 10px;
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
                  <?php
                  require '../db_config/connection.php';
                  $ques_id = $_REQUEST['ques_id'];
                  error_reporting(0);
                  $count = 1;
                  $sql = mysqli_query($conn, "SELECT * FROM question WHERE ques_id = '".$ques_id."'");
                  if($row=mysqli_fetch_array($sql)){?>
                    <div style="float: left;">
                      <span class="table-title">Update Question-Question ID: <?php echo $ques_id; ?></span>
                    </div>
                  <?php } ?>
                </div>
                <div class="modal-body">
                  <div class="add-container">
                    <div class="btn-group" style="top:-50px;left: unset;">
                      <button type="button" class="btn btn-secondary dropdown-toggle btn-show-name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span>Single choice</span>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right drop-button">
                        <button class="dropdown-item btn-choice" type="button">Single choice</button>
                        <button class="dropdown-item btn-choice" type="button">True or False</button>
                        <button class="dropdown-item btn-choice" type="button">Multiple choice</button>
                      </div>
                    </div>
                    <div class="form-container">

                      <!-- Single Choice -->

                      <div class="hidden-form-container">
                        <form class="item" id="btn-single-choice" action="ed_ques.php" method="POST" accept-charset="utf-8">
                          <?php
                          require '../db_config/connection.php';
                          $ques_id = $_REQUEST['ques_id'];
                          error_reporting(0);
                          $count = 1;
                          $sql = mysqli_query($conn, "SELECT * FROM question WHERE ques_id = '".$ques_id."'");
                          if($row=mysqli_fetch_array($sql)){?>
                            <div class="hidden-form">
                              <div class="form-group">
                                <p style="margin-top: 50px;">Content</p><textarea name="content" rows="5" cols="170" required placeholder="Content of Question"><?php echo $row['content'] ?></textarea>
                              </div>
                              <div class="form-group">
                                <input hidden class="form-control" type="text" name="type" value="Single Choice" placeholder="Single Choice" readonly="">
                              </div>
                              <div class="form-group form-sc" style="width: 100%;">
                                <div style="display: flex;">
                                  <div>
                                    <p>Single Choice - Correct Answer: 
                                      <strong style="font-size: 18px;color: #007BFF ">
                                        <span class="correct_answer"><?php echo $row['correct_ans']; ?></span>
                                      </strong>
                                    </p>
                                  </div>
                                </div>

                                <div class="answer-form">
                                  <label class="radio-icon" for="option-1">
                                    <input type="radio" required="true" id="option-1" name="correct_ans" value="A">
                                    <i class="fas fa-check-circle btn-radio"></i>
                                    <span>A.</span>
                                    <input type="text" required name="a_ans" value="<?php echo $row['a_ans']; ?>" id="input-ans" placeholder=" A answer">
                                  </label>
                                </div>
                                <div class="answer-form">
                                  <label class="radio-icon" for="option-2">
                                    <input type="radio" id="option-2" required="true" name="correct_ans" value="B">
                                    <i class="fas fa-check-circle btn-radio"></i>
                                    <span>B.</span>
                                    <input type="text" name="b_ans" required value="<?php echo $row['b_ans']; ?>" id="input-ans" placeholder=" B answer">
                                  </label>
                                </div>
                                <div class="answer-form">
                                  <label class="radio-icon" for="option-3">
                                    <input type="radio" id="option-3" required="true" name="correct_ans" value="C">
                                    <i class="fas fa-check-circle btn-radio"></i>
                                    <span>C.</span>
                                    <input type="text" name="c_ans" value="<?php echo $row['c_ans']; ?>" required id="input-ans" placeholder=" C answer">
                                  </label>
                                </div>
                                <div class="answer-form">
                                  <label class="radio-icon" for="option-4">
                                    <input type="radio" id="option-4" required="true" name="correct_ans" value="D">
                                    <i class="fas fa-check-circle btn-radio"></i>
                                    <span>D.</span>
                                    <input type="text" name="d_ans" value="<?php echo $row['d_ans']; ?>" id="input-ans" required placeholder=" D answer">
                                  </label>
                                </div>

                              </div>
                              <div class="form-group">
                                <div style="width: 100%">
                                  <p>Current Category:
                                    <?php
                                    include('../db_config/connection.php');
                                    $ques_id = $_REQUEST['ques_id'];
                                    $sql = mysqli_query($conn, "SELECT `question`.`cate_id`, cate_title FROM `question` INNER JOIN `category` ON `question`.`cate_id` = `category`.`cate_id` WHERE `question`.`ques_id` ='".$ques_id."'");
                                    if ($row = mysqli_fetch_array($sql)){?>
                                      <a href="categorys.php?Cate_id=<?php echo $row['cate_id']; ?>&title=<?php echo $row['cate_title']; ?>"><option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_title']; ?></option></a>
                                    <?php } ?>
                                  </p>
                                  <select class="form-control" name="cate_id">
                                    <?php
                                    include('../db_config/connection.php');
                                    $ques_id = $_REQUEST['ques_id'];
                                    $sql = mysqli_query($conn, "SELECT * FROM category");
                                    while($row = mysqli_fetch_array($sql)){?>
                                      <option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_title']; ?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <input hidden style="background-color: transparent;" type="text" class="form-control" value="1.5" name="mark" placeholder="Mark" readonly="" required>
                              </div>
                              <div class="add-ques-footer">
                                <a href="questions.php" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary btn-create" name="update_ques" id="sendEmail">Update</button>
                              </div>
                            </div>
                          <?php } ?>
                        </form>
                      </div>

                      <!-- True/False -->

                      <div class="hidden-form-container">
                        <form class="item" id="btn-true-false" action="ed_ques.php" method="POST" accept-charset="utf-8">
                          <?php
                          require '../db_config/connection.php';
                          $ques_id = $_REQUEST['ques_id'];
                          error_reporting(0);
                          $count = 1;
                          $sql = mysqli_query($conn, "SELECT * FROM question WHERE ques_id = '".$ques_id."'");
                          if($row=mysqli_fetch_array($sql)){?>
                            <div class="hidden-form">
                              <div class="form-group">
                                <p style="margin-top: 50px;">Content</p><textarea name="content" rows="5" cols="170" required placeholder="Content of Question"><?php echo $row['content'] ?></textarea>
                              </div>
                              <div class="form-group">
                                <input hidden class="form-control" type="text" name="type" value="<?php echo $row['type'] ?>" placeholder="Single Choice" readonly="">
                              </div>
                              <div class="form-group form-tf" style="width: 100%;">
                                <div style="display: flex;">
                                  <div>
                                    <p>True / False - Correct Answer: 
                                      <strong style="font-size: 18px;color: #007BFF ">
                                        <span class="correct_answer"><?php echo $row['correct_ans']; ?></span>
                                      </strong>
                                    </p>
                                  </div>
                                </div>

                                <div class="answer-form">
                                  <label class="radio-icon" for="option-1">
                                    <input type="radio" required="true" id="option-1" name="correct_ans" value="A">
                                    <i class="fas fa-check-circle btn-radio"></i>
                                    <span>A.</span>
                                    <input type="text" required name="a_ans" value="True" id="input-ans" placeholder=" A answer">
                                  </label>
                                </div>
                                <div class="answer-form">
                                  <label class="radio-icon" for="option-2">
                                    <input type="radio" id="option-2" required="true" name="correct_ans" value="B">
                                    <i class="fas fa-check-circle btn-radio"></i>
                                    <span>B.</span>
                                    <input type="text" name="b_ans" required value="False" id="input-ans" placeholder=" B answer">
                                  </label>
                                </div>
                              </div>
                              <div class="form-group">
                                <div style="width: 100%">
                                  <p>Current Category:
                                    <?php
                                    include('../db_config/connection.php');
                                    $ques_id = $_REQUEST['ques_id'];
                                    $sql = mysqli_query($conn, "SELECT `question`.`cate_id`, cate_title FROM `question` INNER JOIN `category` ON `question`.`cate_id` = `category`.`cate_id` WHERE `question`.`ques_id` ='".$ques_id."'");
                                    if ($row = mysqli_fetch_array($sql)){?>
                                      <a href="categorys.php?Cate_id=<?php echo $row['cate_id']; ?>&title=<?php echo $row['cate_title']; ?>"><option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_title']; ?></option></a>
                                    <?php } ?>
                                  </p>
                                  <select class="form-control" name="cate_id">
                                    <?php
                                    include('../db_config/connection.php');
                                    $ques_id = $_REQUEST['ques_id'];
                                    $sql = mysqli_query($conn, "SELECT * FROM category");
                                    while($row = mysqli_fetch_array($sql)){?>
                                      <option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_title']; ?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <input hidden style="background-color: transparent;" type="text" class="form-control" value="1.5" name="mark" placeholder="Mark" readonly="" required>
                              </div>
                              <div class="add-ques-footer">
                                <a href="questions.php" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary btn-create" name="update_ques" id="sendEmail">Update</button>
                              </div>
                            </div>
                          <?php } ?>
                        </form>
                      </div>

                      <!-- Multiple Choices -->

                      <div class="hidden-form-container">
                        <form class="item" id="btn-multiple-choice" action="ed_ques.php" method="POST" accept-charset="utf-8">
                          <?php
                          require '../db_config/connection.php';
                          $ques_id = $_REQUEST['ques_id'];
                          error_reporting(0);
                          $count = 1;
                          $sql = mysqli_query($conn, "SELECT * FROM question WHERE ques_id = '".$ques_id."'");
                          if($row=mysqli_fetch_array($sql)){?>
                            <div class="hidden-form">
                              <div class="form-group">
                                <p style="margin-top: 50px;">Content</p><textarea name="content" rows="5" cols="170" required placeholder="Content of Question"><?php echo $row['content'] ?></textarea>
                              </div>
                              <div class="form-group">
                                <input hidden class="form-control" type="text" name="type" value="<?php echo $row['type'] ?>" placeholder="Single Choice" readonly="">
                              </div>
                              <div class="form-group form-mc" style="width: 100%;">
                                <div style="display: flex;">
                                  <div>
                                    <p>Multiple Choices - Correct Answer: 
                                      <strong style="font-size: 18px;color: #007BFF ">
                                        <span class="correct_answer"><?php echo $row['correct_ans']; ?></span>
                                      </strong>
                                    </p>
                                  </div>
                                </div>
                                <div class="answer-form">
                                  <label for="option-mc-1">
                                    <input type="checkbox" id="option-mc-1" name="correct_ans[]" value="A">
                                    <i class="fas fa-check-square btn-radio"></i>
                                    <span>A.</span>
                                    <input type="text" name="a_ans" value="<?php echo $row['a_ans']; ?>" placeholder=" A answer" required id="input-ans">
                                  </label>
                                </div>
                                <div class="answer-form">
                                  <label for="option-mc-2">
                                    <input type="checkbox" id="option-mc-2" name="correct_ans[]" value="B">
                                    <i class="fas fa-check-square btn-radio"></i>
                                    <span>B.</span>
                                    <input type="text" name="b_ans" value="<?php echo $row['b_ans']; ?>" placeholder=" B answer" id="input-ans">
                                  </label>
                                </div>
                                <div class="answer-form">
                                  <label for="option-mc-3">
                                    <input type="checkbox" id="option-mc-3" name="correct_ans[]" value="C">
                                    <i class="fas fa-check-square btn-radio"></i>
                                    <span>C.</span>
                                    <input type="text" name="c_ans" value="<?php echo $row['c_ans']; ?>" required placeholder=" C answer" id="input-ans">
                                  </label>
                                </div>
                                <div class="answer-form">
                                  <label for="option-mc-4">
                                    <input type="checkbox" id="option-mc-4" name="correct_ans[]" value="D" >
                                    <i class="fas fa-check-square btn-radio"></i>
                                    <span>D.</span>
                                    <input type="text" name="d_ans" value="<?php echo $row['d_ans']; ?>" required placeholder=" D answer" id="input-ans">
                                  </label>
                                </div>
                              </div>
                              <div class="form-group">
                                <div style="width: 100%">
                                  <p>Current Category:
                                    <?php
                                    include('../db_config/connection.php');
                                    $ques_id = $_REQUEST['ques_id'];
                                    $sql = mysqli_query($conn, "SELECT `question`.`cate_id`, cate_title FROM `question` INNER JOIN `category` ON `question`.`cate_id` = `category`.`cate_id` WHERE `question`.`ques_id` ='".$ques_id."'");
                                    if ($row = mysqli_fetch_array($sql)){?>
                                      <a href="categorys.php?Cate_id=<?php echo $row['cate_id']; ?>&title=<?php echo $row['cate_title']; ?>"><option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_title']; ?></option></a>
                                    <?php } ?>
                                  </p>
                                  <select class="form-control" name="cate_id">
                                    <?php
                                    include('../db_config/connection.php');
                                    $ques_id = $_REQUEST['ques_id'];
                                    $sql = mysqli_query($conn, "SELECT * FROM category");
                                    while($row = mysqli_fetch_array($sql)){?>
                                      <option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_title']; ?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <input hidden style="background-color: transparent;" type="text" class="form-control" value="2" name="mark" readonly placeholder="Mark" required>
                              </div>
                              <div class="add-ques-footer">
                                <a href="questions.php" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary btn-create" name="update_ques" id="sendEmail">Update</button>
                              </div>
                            </div>
                          <?php } ?>
                        </form>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
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
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('.hidden-form-container:first').show();
    $('.btn-choice:first').addClass('active');

    $('.btn-choice').click(function (event) {
      index = $(this).index();
      $('.btn-choice').removeClass('active');
      $(this).addClass('active');
      $('.hidden-form-container').hide();
      $('.hidden-form-container').eq(index).show();
    });
    $('.btn-choice').click(function(){
      var a=$(this).text();
      $('.btn-show-name').text(a);
    });

  });
</script>
</body>

</html>