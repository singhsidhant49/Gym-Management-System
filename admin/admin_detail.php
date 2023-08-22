<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}

include'../connect.php';
$id=$_GET['smd'];
$query="select * from users where id='".$id."'";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result))
{
 $tcon= $row['username'];

?>
<?php
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
              <h1 class="m-0 text-dark">Admin Details</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Admin Details</li>
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
                          <form class="form-horizontal" action="#" method="post" name="Hform" enctype="multipart/form-data">
                            
                            <div class="form-group">
                              <div class="row">
                                
                                <img src="images/users/<?php echo $row['image']; ?>"  class="img-thumbnail mb-3 " width="220px" height="auto" >
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label"> Name</label>
                              <div class="col-sm-9">
                                <input type="text"  value="<?php echo $row['name']; ?>"  class="form-control"required="" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Contact</label>
                              <div class="col-sm-9">
                                <input type="Number" name="con" class="form-control" value="<?php echo $row['username']; ?>" readonly="">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Email</label>
                              <div class="col-sm-9">
                                <input type="email" class="form-control" value="<?php echo $row['email']; ?>" readonly="">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Password</label>
                              <div class="col-sm-9">
                                <input type="text" value="<?php echo $row['password']; ?>"class="form-control" readonly>
                              </div>
                            </div>
                          </div>
                          
                         
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Gender</label>
                              <div class="col-sm-9">
                                <input type="text"  class="form-control" value="<?php echo $row['gender']; ?>" readonly>
                              </div>
                            </div>
                          </div>
                        
                           <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Address</label>
                              <div class="col-sm-9">
                                <textarea class="form-control" rows="4" name="address"style="height: 120px;" readonly=""><?php echo $row['address']; ?></textarea>
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
                          
                        </form>
                      </div>
                    </div>
                    <!-- ***************************transaction table****************************** -->
                
                  <!-- /.content -->
            <!-- *****************transaction table end**************** -->
                </div>
              </div>
              <?php } ?>
            </div>
            <!-- ./wrapper -->
            <!-- jQuery -->
            <?php include 'scripts.php'; ?>
           
          </body>
        </html>
       