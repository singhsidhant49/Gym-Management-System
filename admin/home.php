<?php
session_start();
include'../connect.php';
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}

?>
<?php include 'head.php';
$page='home';

?>
  <div id="loading"></div>
   <div id="sentload" style="display: none;"></div>

<body class="hold-transition sidebar-mini layout-fixed" onload="myFunction()">

<div class="wrapper">
  
  <!-- Navbar -->
  <?php include 'topnav_bar.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<!-- <?php# include 'side_bar.php'; ?> -->
<?php include 'side_bar.php'; ?>

  <!-- Main Sidebar Container End -->
 <!-- ===================bithday modal=================== --> 
<div class="modal fade" id="birthModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-image: url('../img/crop.jpg');">
          
          
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
     <div class="modal-body"style="background-image: url('../img/1.png'); background-size:cover;  background-position: center;">
        <h1 class="">HAPPY BIRTHDAY<br><?php  foreach($_SESSION['cart'] as $productId){
        //Print out the product ID.
        echo $productId.",";

    } ?></h1>
        <div class="col-12">
          
        </div><div class="balloon"></div>
        <div class="balloon"></div>
        <div class="balloon"></div>
        <div class="balloon"></div>
        <div class="balloon"></div>
       </div>
        </div>
       

        <!-- Modal footer -->
        
      </div>
    </div>
  </div>


<!-- ====================================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
 <?php
include_once("../connect.php");
$select=mysqli_query($conn,"select * from slider ORDER BY id DESC"); 
?>
<div id="demo" class="carousel slide" data-ride="carousel" data-interval="2000">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  
      
						<div class="carousel-inner">
	<div class="carousel-item active">
      <img src="banner.jpeg" alt="" width="1100" height="500">
    </div>
    <?php
  
						while($row=mysqli_fetch_array($select))
						{
							$img=$row['slider'];
						    $path="../admin/images/slider/".$img;
						?>
    <div class="carousel-item">
      <img src="../admin/images/slider/<?php echo $img; ?>" alt="" width="1100" height="500">
    </div>
    <?php } ?>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!--<h1 class="m-0 text-dark">Dashboard</h1>-->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
     <div class="container-fluid">

          <!-- ./col -->
     <div class="row">
  <div class="column col-4 p-0 m-0"> 
    <div class="grid-item" style="height: 120px;"><a href="add_enquiry.php" class="text-dark"><i class="far fa-address-book"></i><br><h6>ADD ENQUIRY</h6></a></div>
    <div class="grid-item" style="height: 120px;"><a href="pendingpay.php" class="text-dark"><i class="fa fa-star"></i><br><h6>PENDING PAYMENTS</h6></a></div>
    
    <div class="grid-item bb" style="height: 120px;"><a href="view_blog.php" class="text-dark"><i class="fas fa-blog"></i><br><h6>VIEW POSTS</h6></a></div>
</div>
  
  <div class="column col-4 p-0 m-0">  
    <div class="grid-item" style="height: 120px;"><a href="view_enquiry.php" class="text-dark"><i class="far fa-address-card"></i><br><h6>VIEW ENQUIRY</h6></a></div>
    <div class="grid-item"style="height: 120px;"><a href="new_member.php" class="text-dark"><i class="fas fa-user-plus"></i><br><h6>ADD MEMBER</h6></a></div>
 <div class="grid-item bb" style="height: 120px;"><a href="toptext.php" class="text-dark"><i class=" fab fa-tumblr-square "></i><br><h6>SCROLLER TEXT</h6></a></div>
</div>
 
  <div class="column col-4 p-0 m-0">
   <div class="grid-item br" style="height: 120px;"><a href="due_payments.php" class="text-dark"><i class="fa fa-star"></i><br><h6>DUE PAYMENTS</h6></a></div>
   
    <div class="grid-item br" style="height: 120px;"><a href="view_member.php" class="text-dark"><i class="fas fa-users"></i><br><h6>VIEW MEMBERS</h6></a></div>
<div class="grid-item bb br" style="height: 120px;"><a href="sendemail.php" class="text-dark" id="ms"><i class="fas fa-at"></i><br><h6>SEND REMINDER MAIL</h6></a></div> 
</div>

  </div>
  <?php
  $count=0;
   $query="select * from members where status='Active'";
   $result=mysqli_query($conn,$query);
   while ($row=mysqli_fetch_array($result)) {
     $count++;
   }

  ?>
   <div class="row mt-4">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $count;?>  </h3>

                <p style="font-size: 18px;">Active Members<p>
              </div>
              <div class="icon">
              
              </div>
              <a href="view_member.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                 <?php
               
              $date  = date('d-m-Y');
              $month=date('m');
              $year=date('Y');
              $m=date('F');
              $query1 = "select * from trans_his WHERE  paid_da like  '___".$month."-".$year."'";

              //echo $query;
              $result  = mysqli_query($conn, $query1);
              $revenue = 0;
                  
            while ($row = mysqli_fetch_array($result)) {
                      $value=$row['amt'];
                      $revenue = $value + $revenue;
                    }
                  
              
             
              ?>
              <?php
  $count1=0;
   $query1="select * from members where status='Non Active'";
   $result1=mysqli_query($conn,$query1);
   while ($row=mysqli_fetch_array($result1)) {
     $count1++;
   }

  ?>

                <h3><?php echo "$count1" //echo "₹".$revenue;  ?></h3>

                <p style="font-size: 18px;">Non Active Members</p>
               
              </div>
              <div class="icon">
              
              </div>
              <a href="income_month.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                 <?php
                    
                    $query2="select * from members ";
                    $result=mysqli_query($conn,$query2);
                    $payi=0;
                    while ($row=mysqli_fetch_array($result)) {
                      $pen =$row['pendingpayment'];
                      $payi=$payi+$pen;
                        }

                ?>
  
                <h3><?php echo "₹".$payi;?></h3>

                <p style="font-size: 18px;">Pending Payments</p>
              </div>
              <div class="icon">
              
              </div>
              <a href="pendingpay.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                 $num=0;
                    $sql  = "select * from members where status='Active'";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)) {
                             $exp =$row['expiry_date'];
                               $d=date('d-m-Y'); 
                                $td =strtotime("$d");
                                $expp  =strtotime("$exp");
                               if($td>$expp||$td==$expp)
                               {
                                $num++;
                              }    
                              }
                            
                 ?>
                <h3><?php echo $num;?></h3>

                <p style="font-size: 18px;">Due Payments</p>
              </div>
              <div class="icon">
              </div>
              <a href="due_payments.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>





  </div>
</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021-2022 <a href="#">GYM PRO</a>.</strong>
    All rights reserved.
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
    // $(document).ready(function(){
      //  $('div#loading').removeAttr('id');
    // });
    var preloader = document.getElementById("loading");
    // window.addEventListener('load', function(){
    //  preloader.style.display = 'none';
    //  })

    function myFunction(){
      preloader.style.display = 'none';
    };
    
  </script>
  <script>

    $("#ms" ).click(function() {
     
    $("#sentload").show()
    });

  </script>
<?php //include 'birthday.php';?>









</body>
</html>
<link rel="stylesheet" href="popup_style.css">


<?php if(!empty($_SESSION['cart'])) {  ?>
<div class="popup  -success js_success-popup popup--visible">
  <div class="popup__background" style="background-image: url('../img/1.png'); background-size:cover;  background-position: center;"></div>
  <div class="popup__content ">
    <h3 class="popup__content__title">
      HAPPY BIRTHDAY
    </h3>
    <p><?php  foreach($_SESSION['cart'] as $productId){
        //Print out the product ID.
        echo $productId.",";

    } ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["cart"]);  
} ?>

<?php if(!empty($_SESSION['toptextt'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['toptextt']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["toptextt"]);  
} ?>

<?php if(!empty($_SESSION['sentmail'])) {  ?>
<script>
  $("#sentload").hide();
  
</script>
  <div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['sentmail']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["sentmail"]);  
} ?>

<?php if(!empty($_SESSION['compose_send_success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
    Success
    </h1>
    <p><?php echo $_SESSION['compose_send_success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION['compose_send_success']);
} ?>

<?php if(!empty($_SESSION['compose_send_error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
    Error
    </h>
    <p><?php echo $_SESSION['compose_send_error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["compose_send_error"]);  } ?> 

<?php if(!empty($_SESSION['remm2_success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['remm2_success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["remm2_success"]);  
} ?>
<!-- ======================================================================== -->

<?php if(!empty($_SESSION['remm2_error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h3>
    <p><?php echo $_SESSION['remm2_error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["remm2_error"]);  } ?>


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