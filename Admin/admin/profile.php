<?php
include 'check_login.php';
include 'count_records.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Manage Faculty</title>
  <meta http-equiv="refresh" content="120">
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
  <link rel="stylesheet" href="../css/student.css">
  <script src="js/extention/choices.js"></script>
  <script>
    const choices = new Choices('[data-trigger]', {
      searchEnabled: false,
      itemSelectText: '',
    });
  </script>
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
              <section class="content">
                <div class="row">
                  <section class="col-lg-4">
                    <div class="box box-primary">
                      <div class="box-body box-profile">
                       <?php
                       include '../db_config/connection.php';
                       $sql = "SELECT * FROM tinhtv_admin where username='$myusername' or email='$myusername'";
                       $result = $conn->query($sql);
                       if ($result->num_rows > 0)
                       {
                        while($row = $result->fetch_assoc())
                        {
                          $avatar = $row['img_dd'];
                          $gender = $row['gender'];
                          $name = $row['username'];
                          $fname = $row['fullname'];
                          $user_email = $row['email'];
                          $address = $row['address'];
                          $DoB = $row['DoB'];
                          $pass = $row['password'];
                          if ($avatar == null)
                          {
                            if ($gender == "Male")
                            {
                              print '<img src="../dist/img/avatar.png" class="profile-user-img img-responsive img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
                            }
                            else
                            {
                              print '<img src="../dist/img/avatar3.png" class="profile-user-img img-responsive img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
                            }
                          }
                          else
                          {
                           echo '<img src="../dist/img/'.$row['img_dd'].'" class="profile-user-img img-responsive img-circle" alt="'.$current_user.'" title="'.$current_user.'"/>';
                         }
                       }
                     } else {
                     }
                     $conn->close();
                     ?>
                     <h3 class="profile-username text-center"><?php echo"$current_user"; ?></h3>

                     <p class="text-muted text-center"><i><a href="mailto:tinhtvbhaf180186@fpt.edu.vn" title="tinhtvbhaf180186@fpt.edu.vn" style="text-decoration: underline;"><?php echo"$user_email"; ?></a></i></p>

                     <ul class="list-group list-group-unbordered">
                      <li class="list-group-item">
                        <b>NAME</b> <a class="pull-right"><?php echo"$fname"; ?></a>
                      </li>
                      <li class="list-group-item">
                        <b>GENDER</b> <a class="pull-right"><?php echo"$gender"; ?></a>
                      </li>
                      <li class="list-group-item">
                        <b>ADDRESS</b> <a class="pull-right"><?php echo"$address"; ?></a>
                      </li>
                      <li class="list-group-item">
                        <b>DATE OF BIRTH</b> <a class="pull-right"><?php echo"$DoB"; ?></a>
                      </li>
                    </ul>
                    <form action="update_avt.php" method="POST" enctype="multipart/form-data">
                     <input type="file" name="f1" accept="image/*" required><br>
                     <button type="submit" class="pull-right btn btn-default" name="uplogo" id="sendEmail" style="padding: 5px; background-color: blue; color: white; border-radius: 5px;">UPLOAD <i class="fa fa-arrow-circle-up"></i></button>
                   </form>
                 </div>
               </div>
             </section>
             <section class="col-lg-8">
              <div class="box box-info" style="font-size: 12px">
                <div class="box-header">
                  <i class="fa fa-user"></i>
                  <h3 class="box-title">UPDATE PROFILE</h3>
                </div>
                <div class="box-body">
                 <form action="update_profile.php" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control" name="name" value="<?php echo"$fname"; ?>" placeholder="Enter your fullname" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="address" value="<?php echo"$address"; ?>" placeholder="Enter your address" required>
                  </div>
                  <div class="form-group">
                    <select name="gender" class="form-control">
                      <option value="gender"><?php echo "$gender"; ?></option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" value="<?php echo"$user_email"; ?>" placeholder="Enter your email" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password1" value="<?php echo"$pass"; ?>"  placeholder="New Password" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="confirm_password" name="password2"  placeholder="Confirm new password" required>
                  </div>
                  <script>var password = document.getElementById("password"), confirm_password = document.getElementById("confirm_password");function validatePassword(){if(password.value != confirm_password.value){confirm_password.setCustomValidity("Password is not match");}else{confirm_password.setCustomValidity('');}}password.onchange = validatePassword;confirm_password.onkeyup = validatePassword;</script>
                  <button type="submit" style="padding: 5px; background-color: blue; color: white; border-radius: 5px;" class="pull-right btn btn-default" name="upschool" id="sendEmail">SAVE <i class="fa fa-arrow-circle-down"></i></button>
                </form>
              </div>
            </div>
          </section>
        </section>
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