<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
?>

<?php 
$page='admem';
include 'head.php';
include'../connect.php';
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
              <h1 class="m-0 text-dark">Add Member</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Add Member</li>
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
                          <form class="form-horizontal needs-validation" action="save_member.php" method="POST" name="memform" enctype="multipart/form-data"novalidate>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Customer Photo</label>
                                <div class="col-sm-9">

                                  <input type="file" name="imge" class="form-control" />
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Customer Name</label>
                                <div class="col-sm-9">
                                  <input type="text" name="cust" placeholder="Customer Name"  class="form-control"required="">
                                  <input type="hidden" name="mtype" value="2">

                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Mobile Number</label>
                                <div class="col-sm-9">
                                  <input type="Number" name="con" class="form-control" placeholder="Mobile Number" id="tbNumbers" minlength="10" maxlength="10" required="">
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Emergency Number</label>
                                <div class="col-sm-9">
                                  <input type="Number" name="alcon" class="form-control" placeholder="Emergency Number" id="tbNumbers">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                  <input type="email" name="email" class="form-control"   placeholder="Email" >
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">App Password</label>
                                <div class="col-sm-9">
                                  <input type="Password" value="" name="memberpass" class="form-control"placeholder="App Password" required="">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-9">
                                  <select name="gender" id="gender" class="form-control" required>
                                    <option value="">--Select Gender--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Date Of Birth</label>
                                <div class="col-sm-9">
                                  <input type="date" name="dob" class="form-control" placeholder="Birth Date" required="">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control" rows="4" name="address" placeholder="Address" style="height: 120px;" required></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Height</label>
                                <div class="col-sm-9">
                                  <input type="number" name="feet" class="form-control" placeholder="Cm" >
                                </div>
                              
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Weight</label>
                                <div class="col-sm-9">
                                  <input type="number" name="weight" class="form-control" placeholder="Weight">
                                </div>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">BMI</label>
                                <div class="col-sm-9">
                                  <input type="text" name="bmi2" class="form-control" placeholder="BMI">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">BMR</label>
                                <div class="col-sm-9">
                                  <input type="text" name="bmr" class="form-control" placeholder="BMR">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">FAT%</label>
                                <div class="col-sm-9">
                                  <input type="text" name="fat" class="form-control" placeholder="FAT%">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">BP</label>
                                <div class="col-sm-9">
                                  <input type="text" name="bp" class="form-control" placeholder="BP">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Fitness Goal</label>
                                <div class="col-sm-9">
                                    <input style="margin-right:5px;" type="checkbox" name="fitnessgoal[]" value="Fat Loss">Fat Loss<br>
                                    <input style="margin-right:5px;" type="checkbox" name="fitnessgoal[]" value="Bodybuilding">Body building<br>
                                    <input style="margin-right:5px;" type="checkbox" name="fitnessgoal[]" value="Weight Gain">Weight Gain<br>
                                    <input style="margin-right:5px;" type="checkbox" name="fitnessgoal[]" value="Flexibility">Flexibility<br>
                                    <input style="margin-right:5px;" type="checkbox" name="fitnessgoal[]" value="General Fitness">General Fitness<br>
                                    <input style="margin-right:5px;" type="checkbox" name="fitnessgoal[]" value="Body Toning">Body Toning
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Medical History</label>
                                <div class="col-sm-9">
                                    <textarea name="medi" class="form-control" placeholder="Medical History" required></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">
                                  Joining Date
                                </label>
                                <div class="col-sm-9">
                                    <!--<input type="date" name="jd" class="form-control" value="" required="" >-->
                                    <input type="text" name="jd" class="form-control" placeholder="dd-mm-yyyy" required>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-9">
                                  <select name="status" id="status" class="form-control" required>
                                    <option value="">--Select Status--</option>
                                    <option value="Active">Active</option>
                                    <option value="Non Active">Non Active</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Select Plan</label>
                                <div class="col-sm-9">
                                  <select name="plann" class="form-control" required onchange="myplandetail(this.value)">
                                    <option value="">--Select Plan--</option>
                                    <?php
                                    $query="select * from plan";
                                    $result=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_array($result)){
                                    ?>
                                    <option value="<?php echo $row['plan_name'] ?>"><?php echo $row['plan_name'] ?></option>
                                                      <?php
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <!--  =====used for ajax================ -->

                          <div id="plandetls">
             
                           </div>
                            

                           <div class="form-group">
    <div class="row">
        <label class="col-sm-3 control-label">Pending Payment</label>
        <div class="col-sm-9">
            <input type="text" name="pendingpayment" class="form-control" placeholder="Pending Payment"  >
        </div>
    </div>
</div>

                             <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">
                                  Pending Pay Date
                                </label>
                                <div class="col-sm-9">
                  <!-- == -->        <input type="text" name="pendingdate" class="form-control" placeholder="dd-mm-yyyy">
                                </div>
                              </div>
                            </div>



                            <!-- ======for payment field============ -->
                            
                            <button type="submit" name="btn_save" class="btn btn-primary btn-md mx-4 my-3 px-4 float-right">SUBMIT</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <!-- ======for payment field============ -->

                  <script>
          function myplandetail(str)
          {

            if(str=="")
            {
              document.getElementById("plandetls").innerHTML = "";
              return;
            }
            else
            {
              if (window.XMLHttpRequest)
               {
               // code for IE7+, Firefox, Chrome, Opera, Safari
                 xmlhttp = new XMLHttpRequest();
               }
              xmlhttp.onreadystatechange = function() 
              {
                if (this.readyState == 4 && this.status == 200) 
                {
                   document.getElementById("plandetls").innerHTML=this.responseText;
                
                }
              };
              
               xmlhttp.open("GET","plandetail.php?q="+str,true);
               xmlhttp.send();  
            }
            
          }
        </script>
        

      


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
            <?php if(!empty($_SESSION['new_mem_error'])) {  ?>
            <div class="popup popup--icon -error js_error-popup popup--visible">
              <div class="popup__background"></div>
              <div class="popup__content">
                <h3 class="popup__content__title">
                Error
                </h1>
                <p><?php echo $_SESSION['new_mem_error']; ?></p>
                <p>
                  <button class="button button--error" data-for="js_error-popup">Close</button>
                </p>
              </div>
            </div>
            <?php unset($_SESSION["new_mem_error"]);  } ?>
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