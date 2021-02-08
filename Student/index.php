<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Quiz Online - BTEC FPT</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../Admin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="icon" href="../Admin/dist/img/icon.png">
  <link rel="stylesheet" href="../Admin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../Admin/plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="./?page=Login"><font color="white"><b>EXAM ONLINE </b> BTEC FPT</font></a>
    </div>
    <?php
    if(isset($_GET['login_err'])) {
      $error = $_GET['login_err'];
      print '<center><b style="color:white;">';
      echo $error;
      print '</b></center>';
    }
    ?>
    <?php
    if(isset($_GET['message']))
    {
      $error = $_GET['message'];
      print '<center><b style="color:green;">';
      echo $error;
      print '</b></center>';
    }
    ?>
    <div class="login-box-body">
      <p class="login-box-msg">
      </p>

      <form action="login.php" method="POST">
        <div class="form-group has-feedback">
          <input type="text" name="student_email" class="form-control" placeholder="Username" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="student_password" class="form-control" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
          </div>
          <div class="col-xs-4">
            <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">LOGIN</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
    });
  </script>
</body>
</html>