<?php
session_start();

include'connect.php';



      if (isset($_POST['log'])) 
      {
      	$em=$_POST['em'];
      	$op=$_POST['num'];
         if($op==$_SESSION['otp'])
         {

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GRAVITY FITNESS | Recover Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Welcome To GRAVITY FITNESS </b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <h3 class="login-box-msg"> recover your password.</h3>

    <form action="changepass.php" method="post">
                <input type="hidden" name="em" value="<?php echo $em ; ?>">
     <div class="input-group mb-3">
         <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
       
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block"  name="save_user"  id="save_user">Change password</button>
                  </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="index.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>

</body>
</html>



<link rel="stylesheet" href="admin/popup_style.css">























<?php
         }
         else
         {
         	 unset($_SESSION["otp"]);
         	$_SESSION['checkpass']="Invalid OTP";
         	header('location:forgot.php');
         }

      }	




      ?>