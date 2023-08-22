<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}

 include 'head.php';
$page='adenq';
include '../connect.php';

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
            <h1 class="m-0 text-dark">Add Enquiry</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Enquiry</li>
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
                                    <form class="form-horizontal" action="save_enquiry.php" method="POST" name="enqform">
                                        <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-3 control-label">Enquiry Date</label>
                                                <div class="col-sm-9">
                                                  <input type="text" value="<?php echo date('d/m/Y')?>" name="enquiry_date" class="form-control" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Customer Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="customer_name" placeholder="Customer Name"  class="form-control"  required>
                                                </div>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Contact</label>
                                                <div class="col-sm-9">
                                                    <input type="Number" name="contact" class="form-control" placeholder="Contact Number" id="tbNumbers" minlength="10" maxlength="10" required="">
                                                </div>
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Age</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="age" class="form-control" placeholder="Age" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Gender</label>
                                                <div class="col-sm-9">
                                                   <select name="gender" id="gender" class="form-control" required>
                                                    <option value=" ">--Select Gender--</option>
                                                     <option value="Male">Male</option>
                                                      <option value="Female">Female</option>
                                                   </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Info</label>
                                                <div class="col-sm-9">
                                                    <textarea name="info" class="form-control" placeholder="info"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                         
                                        <button type="submit" name="btn_save" class="btn btn-primary mx-2 my-2 py-2 px-3 float-right">SUBMIT</button>
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

<!-- <?php //if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php //echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php //unset($_SESSION["success"]);  
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

