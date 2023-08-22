<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}

include'../connect.php';
$id=$_POST['smd'];
$query="select * from members where mid='".$id."'";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result))
{
 include 'head.php';
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
              <h1 class="m-0 text-dark">Edit Member</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Edit Member</li>
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
                          <form class="form-horizontal" action="edit_member2.php" method="post" name="emform" enctype="multipart/form-data">
                            <input type="hidden" name="em" value="<?php echo $id ;?>">
                            <input type="hidden" name="oldcon" value="<?php echo $row['contact']; ?>">
                            
                          
                          <div class="form-group">
                              <div class="row">
                                
                                <img src="images/users/<?php echo $row['m_image']; ?>"  class="img-thumbnail mb-3 " width="220px" height="auto" >
                              </div>
                              
                           </div> 
                                                    

                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Change image</label>
                                <div class="col-sm-9"> 
                                  <input type="file" name="im" class="form-control">
                              </div>
                              </div>
                            </div> 

                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Customer Name</label>
                                <div class="col-sm-9">
                                  <input type="text" name="cust" value="<?php echo $row['cus_name']; ?>"  class="form-control"required="">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Mobile Number</label>
                                <div class="col-sm-9">
                                  <input type="Number" name="con" class="form-control" value="<?php echo $row['contact']; ?>" id="tbNumbers" minlength="10" maxlength="10" required="">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Emergency Number</label>
                                <div class="col-sm-9">
                                  <input type="Number" name="alcon" class="form-control" value="<?php echo $row['alcontact']; ?>" id="tbNumbers" minlength="10" maxlength="10">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                  <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" >
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                  <input type="Password" value="<?php echo $row['password']; ?>" name="memberpass" class="form-control" required="">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-9">
                                  <select name="gender" id="gender" class="form-control" required >
                                    <option value="<?php echo $row['gender']; ?>" selected><?php echo $row['gender']; ?></option>
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
                                  <input type="date" name="dob" class="form-control" value="<?php echo $row['dob']; ?>" required="">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-9">
                                  <textarea class="form-control" rows="4" name="address"style="height: 120px;" required><?php echo $row['address']; ?></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Height</label>
                                <div class="col-sm-9">
                                  <input type="number" name="feet" class="form-control" value="<?php echo $row['h_feet']; ?>" >
                                </div>
                                
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Weight</label>
                                <div class="col-sm-9">
                                  <input type="number" name="weight" class="form-control" value="<?php echo $row['weight']; ?>">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">BMI</label>
                                <div class="col-sm-9">
                                  <input type="text" name="bmi2" class="form-control" value="<?php echo $row['bmi2']; ?>">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">BMR</label>
                                <div class="col-sm-9">
                                  <input type="text" name="bmr" class="form-control" value="<?php echo $row['bmr']; ?>">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">FAT%</label>
                                <div class="col-sm-9">
                                  <input type="text" name="fat" class="form-control" value="<?php echo $row['fat']; ?>">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">BP</label>
                                <div class="col-sm-9">
                                  <input type="text" name="bp" class="form-control" value="<?php echo $row['bp']; ?>">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Medical History</label>
                                <div class="col-sm-9">
                                  <input type="text" name="medi" class="form-control" value="<?php echo $row['medicalhistory']; ?>">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">
                                  Joining Date
                                </label>
                                <div class="col-sm-9">
                                  <input type="text" name="jd" class="form-control" value="<?php echo $row['joining_date']; ?>" required=>
                                </div>
                              </div>
                            </div>

                          
                            <!--  =====used for ajax================ -->
                            <div></div>
                            <!-- ======for payment field============ -->
                               <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Current Status</label>
                                <div class="col-sm-9">
                                  <input type="text"  class="form-control" value="<?php echo $row['status']; ?>" readonly>
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
                            
                            
                            <button type="submit" name="btn_save" class="btn btn-success btn-md mx-4 my-3 px-4 float-right">UPDATE</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                
                <?php } ?>
                <!-- ./wrapper -->
                <!-- jQuery -->
                <?php include 'scripts.php'; ?>
              </body>
            </html>
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