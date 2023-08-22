<?php
session_start();
 if ($_SESSION['type']!=1) {
     //not logged in/not admin
     //redirect to homepage
     header("Location: ../index.php");
     die();
}
include '../connect.php';
   if(isset($_POST['adtxt']))
{
 $t=$_POST['top_text'];
        $query = "UPDATE toptext SET texxt='".$t."' WHERE txtid='1'";
 mysqli_query($conn,$query);
 $_SESSION['toptextt']="Text Updated Successfully";
 header("Location: home.php");
}
?>

<?php include 'head.php';



?>

<div id="loading"></div>
<body class="hold-transition sidebar-mini layout-fixed" onload="myFunction()">
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'topnav_bar.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php include 'side_bar.php'; ?>
  <!-- Main Sidebar Container End -->

  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
          <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Text</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Text</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                <div class="row">
                     <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                        <!--xxxxxxxxxxxxxxxxxxxx----FORM----xxxxxxxxxxxxxxxxxxxxx -->
                               <form method="post" action="">
                                  <?php
                                     $qu="select * from toptext";
                                       $res=mysqli_query($conn,$qu);
                                        if($row=mysqli_fetch_array($res))
                                          { 
                                          ?>

                                            <label>CURRENT TEXT</label>
                                        <textarea disabled name="top_text"  class="textarea" placeholder="Enter yours Text Here" style="width: 100%; min-height: 150px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row['texxt'];?></textarea>
                                

                                        <?php 
                                            }
                                             ?>

                                <label>CHANGE TEXT</label>
                                <textarea name="top_text"  class="textarea" placeholder="Enter yours Text Here" style="width: 100%; min-height: 150px; font-size: 18px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    <button type="submit" class="btn btn-success float-right" name="adtxt">UPDATE</button>

                              </form>            
                          
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
<!-- ./wrapper -->

<!-- jQuery -->

<?php include 'scripts.php'; ?>
 
</body>
</html>
<!-- =======================popup alert======================================= -->
<link rel="stylesheet" href="popup_style.css">
<!-- ====================sucess used in view_enquiry.php============================ -->

<!--  //if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p> //echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
 //unset($_SESSION["success"]);  
//} ?> -->
<!-- =============================================================================== -->
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
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

