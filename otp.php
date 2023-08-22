<?php
session_start();

include'connect.php';



      if (isset($_POST['login'])) 
      {
      
      	$email=$_POST['email'];
      	$query="select email from users where email='".$email."'";
      	$result=mysqli_query($conn,$query);
      	if($row=mysqli_fetch_array($result))
      	{
      		$ram=rand( 10000 , 99999 );
      		$_SESSION['otp']=$ram;

      		$to_email = $email;  //change id to admin emailid to get notifications
              $subject = "Request To Change GRAVITY FITNESS  Password";
              $txt = "Hi there your otp to change Gravity Fitness password is  '$ram'";
              $headers = "bishtsuraj04@gmail.com";    //change id to admin emailid
             mail($to_email,$subject,$txt,$headers);  






 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GRAVITY FITNESS | Forgot Password</title>
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
    <a href="#"><b> Welcome To GRAVITY FITNESS</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <h3 class="login-box-msg">ENTER OTP</h3>

    <form action="otpcheck.php" method="post">
                <input type="hidden" name="em" value="<?php echo $email ;  ?>">
                  <div class="input-group mb-3">
          <label for="otp" class="sr-only">otp</label>
                    <input type="text" name="num" id="num" class="form-control" placeholder="******" required="">
                   <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name="log">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="index.php">Login</a>
      </p>
    
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

<?php if(!empty($_SESSION['checkpass'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
    Error
    </h1>
    <p><?php echo $_SESSION['checkpass']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup" style="margin-top: 20px;">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["checkpass"]);  } ?> 
<script>
var addButtonTrigger = function addButtonTrigger(el) {
el.addEventListener('click', function () {
var popupEl = document.querySelector('.' + el.dataset.for);
popupEl.classList.toggle('popup--visible');
});
};
Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
</script>













































<?php

      	}

      	else
      	{
      		$_SESSION['checkpass']="Email Not found";
      		header('location:index.php');
      	}
}
?>