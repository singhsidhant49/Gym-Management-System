<?php
$page='bmi';
session_start();
include'../connect.php';
if ($_SESSION['type']!=2) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
?>
 
<?php include 'mhead.php';
$page='bmi';

ob_start();?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
 <?php include 'warning.php'; ?>
  <!-- Navbar -->
  <?php include 'mtopnav_bar.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'mside_bar.php'; ?>

  <!-- Main Sidebar Container End -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
       <div class="container-fluid">
                    
                   
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dash-box">
                                    <h4 class=" font-weight-bold">CALCULATE BMI</h4>
                                    <ul class="list-inline weight">
                                          <form method="POST">
                              <div class="form-group row">
                              <label class="col-sm-2 control-label" for="weight">Weight in kg.</label>
                             <div class="col-sm-10">
                             <input type="text" class="form-control" id="weight" name="weight" placeholder="Enter your weight in kilograms.">
                             </div>
                             </div>
                             <div class="form-group row">
                              <label class="col-sm-2 control-label" for="height">Height in cm.</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="height" name="height" placeholder="Enter your height in centimeters.">
                              </div>
                            </div>
                            <div class="form-group mt-3 row">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-10 align-right">
                                <button type="submit" class="btn btn-success btn-block" name="calculate">Calculate</button>
                              </div>
                            </div>
                          </form>
                          <?php
if(isset($_POST['calculate']))
{
$weight=0;
$height=0;

$weight=$_POST['weight'];
$height=$_POST['height'];

 @$bmi = ($weight / $height / $height) * 10000;
           $bmiRounded = round($bmi, 1);
          
             if($bmiRounded <= 18.4){
               echo $message = "You are underweight.";
             }
             if($bmiRounded >= 18.5 && $bmiRounded <= 24.9){
               echo $message = "Congrats!!! You have normal weight.";
             }
             if($bmiRounded >= 25 && $bmiRounded <= 29.9){
              echo $message = "You are overweight.";
             }
             if($bmiRounded >= 30 ){
              echo $message = "Be careful!!! You are obese.";
             }
             
             echo "<div id='cbm'><h2>Your BMI is $bmiRounded </h2></div>";
          

             $query="update members set bmi ='".$bmiRounded."' where mid ='".$_SESSION['id']."'";
             mysqli_query($conn,$query);
}
?>
                                    </ul>
                                </div>
                                </div>
            </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer" style="font-size:14px;">
    <strong>Copyright &copy; 2020-2021 <a href="#">GRAVITY FITNESS</a></strong>
    <div class="float-right d-none d-sm-inline-block">
     
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../admin/plugins/moment/moment.min.js"></script>
<script src="../admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../admin/dist/js/demo.js"></script>
<script src="../admin/plugins/sweetalert2/sweetalert2.min.js"></script>


</body>
</html>
<link rel="stylesheet" href="popup_style.css">

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