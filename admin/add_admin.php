<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}

$page='adadm';
 include 'head.php';

?>
<div id="loading"></div>
<body class="hold-transition sidebar-mini layout-fixed" onload="myFunction()">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include 'topnav_bar.php';
     include 'side_bar.php'; ?>
    <!-- Main Sidebar Container End -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" >
      <!-- Content Header (Page header) -->
      <div class="content-header" >
        <div class="container-fluid">
          <div class="row mb-2" >
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Add Admin</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Add Admin</li>
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
                            <form class="form-horizontal needs-validation" action="save_admin.php" method="POST" name="memform" enctype="multipart/form-data"novalidate>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">capture image</label>
                                <div class="col-sm-9">
                                  <input type="file" name="user_image" class="form-control" >
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Customer Name</label>
                                <div class="col-sm-9">
                                  <input type="text" name="user_name" placeholder="Customer Name"  class="form-control"required="">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Contact</label>
                                <div class="col-sm-9">
                                  <input type="Number" name="user_username" class="form-control" placeholder="Contact Number" id="tbNumbers" minlength="10" maxlength="10" required="">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                  <input type="email" name="user_email" class="form-control"   placeholder="Email" >
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                  <input type="Password" value="" name="user_password" class="form-control"placeholder="Password" required="">
                                </div>
                              </div>
                            </div>
                            <input type="hidden" name="user_type" value="1">
                            
                          
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-9">
                                  <select name="user_gender" class="form-control" required>
                                    <option value="">--Select Gender--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                         
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control" rows="4" name="user_address" placeholder="Address" style="height: 120px;" required></textarea>
                                </div>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-9">
                                  <select name="user_status"  class="form-control" required>
                                    <option value="">--Select Status--</option>
                                    <option value="Active">Active</option>
                                    <option value="Non Active">Non Active</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            
                           
                            <!-- ======for payment field============ -->
                            
                            <button type="submit" name="save_user" class="btn btn-primary btn-md mx-4 my-3 px-4 float-right">SUBMIT</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <!-- ======for payment field============ -->



                <!-- =================================== -->
                <!-- ./wrapper -->
                <!-- jQuery -->
                   <?php include 'scripts.php'; ?>
                <script type="text/javascript">
                // Disable form submissions if there are invalid fields
                (function() {
                'use strict';
                window.addEventListener('load', function() {
                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
                }, false);
                });
                }, false);
                })();
                </script>
              </body>
            </html>
            <!-- =======================popup alert======================================= -->
            <link rel="stylesheet" href="popup_style.css">
            <!-- ====================sucess used in view_member.php============================ -->
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
            <?php if(!empty($_SESSION['add_adm_error'])) {  ?>
            <div class="popup popup--icon -error js_error-popup popup--visible">
              <div class="popup__background"></div>
              <div class="popup__content">
                <h3 class="popup__content__title">
                Error
                </h1>
                <p><?php echo $_SESSION['add_adm_error']; ?></p>
                <p>
                  <button class="button button--error" data-for="js_error-popup">Close</button>
                </p>
              </div>
            </div>
            <?php unset($_SESSION["add_adm_error"]);  } ?>

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