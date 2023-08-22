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
include'../connect.php';
$id=$_GET['smd'];
$query="select * from members where mid='".$id."'";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result))
{
 $tcon= $row['contact'];

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
              <h1 class="m-0 text-dark">Member Details</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Member Details</li>
                </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
                </div><!-- /.container-fluid -->
              </div>
              <!-- /.content-header -->
              <!-- Container fluid  -->
              <div class="container-fluid">
                <!-- Start Page Content -->
              <section class="content">
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
                            <input type="hidden" name="em" value="<?php echo $id ;?>">
                            
                          
                          <div class="form-group">
                              <div class="row">
                                
                                <img src="images/users/<?php echo $row['m_image']; ?>"  class="img-thumbnail mb-3 " width="220px" height="auto" >
                              </div>
                              
                           </div> 
                                                    

                             <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Customer Name</label>
                              <div class="col-sm-9">
                                <input type="text"  value="<?php echo $row['cus_name']; ?>"  class="form-control"required="" readonly>
                              </div>
                            </div>
                          </div>

                            <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Mobile Number</label>
                              <div class="col-sm-9">
                                <input type="Number" name="con" class="form-control" value="<?php echo $row['contact']; ?>" readonly="">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Emergency Number</label>
                              <div class="col-sm-9">
                                <input type="Number" name="con" class="form-control" value="<?php echo $row['alcontact']; ?>" readonly="">
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
                              <label class="col-sm-3 control-label">Date Of Birth</label>
                              <div class="col-sm-9">
                                <input type="date"  class="form-control" value="<?php echo $row['dob']; ?>" readonly>
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
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Height</label>
                              <div class="col-sm-9">
                                <input type="number"  class="form-control" value="<?php echo $row['h_feet']; ?>" readonly>
                              </div>
                              
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Weight</label>
                              <div class="col-sm-9">
                                <input type="number"  class="form-control" value="<?php echo $row['weight']; ?>"readonly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">BMI</label>
                              <div class="col-sm-9">
                                <input type="text"  class="form-control" value="<?php echo $row['bmi2']; ?>"readonly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">BMR</label>
                              <div class="col-sm-9">
                                <input type="text"  class="form-control" value="<?php echo $row['bmr']; ?>"readonly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">FAT%</label>
                              <div class="col-sm-9">
                                <input type="text"  class="form-control" value="<?php echo $row['fat']; ?>"readonly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">BP</label>
                              <div class="col-sm-9">
                                <input type="text"  class="form-control" value="<?php echo $row['bp']; ?>"readonly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Fitness Goal</label>
                              <div class="col-sm-9">
                                <input type="text"  class="form-control" value="<?php echo $row['fitnessgoal']; ?>"readonly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Medical History</label>
                              <div class="col-sm-9">
                                <input type="text"  class="form-control" value="<?php echo $row['medicalhistory']; ?>"readonly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">
                                Joining Date
                              </label>
                              <div class="col-sm-9">
                                <input type="text"  class="form-control" value="<?php echo $row['joining_date']; ?>" readonly>
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
                              <label class="col-sm-3 control-label">Current Plan</label>
                              <div class="col-sm-9">
                                <input type="text" name="" class="form-control" value="<?php echo $row['plan']; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Plan Amount</label>
                              <div class="col-sm-9">
                                <input type="text" name="" class="form-control" value="₹<?php echo $row['amount']; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Plan Validity</label>
                              <div class="col-sm-9">
                                <input type="text" name="" class="form-control" value="<?php echo $row['months']; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Fees Paid On</label>
                              <div class="col-sm-9">
                                <input type="text" name="" class="form-control" value="<?php echo $row['paid_date']; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Next Fees Due On</label>
                              <div class="col-sm-9">
                                <input type="text" name="" class="form-control" value="<?php echo $row['expiry_date']; ?>" readonly>
                              </div>
                            </div>
                          </div>
                          </form>

                        </div>

                      </div>
                    </div>
                  </div>
                  
                </div>
              </section>
                  <section class="content">
                      <div class="row">
                           <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                          <div class="card">
                            <div class="card-header">
                              <h2 class="card-title font-weight-bold">All Payment History </h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <div class="table-responsive ">
                                <table id="example1" class="table table-bordered table-striped ">
                                  <thead>
                                    <tr>
                                      <th>Serial No</th>
                                      <th>Plan Name</th>
                                      <th>Months / Days </th>
                                      <th>Amount</th>
                                      <th>Fees paid on</th>
                                      <th>Next fee due on</th>
                                      <th>Invoices</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $num=1;      
                                    $sql = "SELECT * FROM trans_his where contact='".$tcon."' ORDER BY tid desc" ;
                                    $result = mysqli_query($conn,$sql);
                                    while($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                      <td><?php echo $num; ?></td>
                                      <td><?php echo $row['plan_name']; ?></td>
                                      <td><?php echo $row['month'];?></td>
                                      <td>₹<?php echo $row['amt']; ?></td>
                                      <td><?php echo $row['paid_da']; ?></td>
                                      <td><?php echo $row['expiry_da']; ?></td>
                                      <td><a href="invoices.php?tid=<?php echo $row['tid']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                                    </tr>
                                    <?php
                                    $num++;
                                    } ?>
                                  </tbody>
                                  <tfoot>
                                  <tr>  
                                      <th>Serial No</th>
                                      <th>Plan Name</th>
                                      <th>Months / Days</th>
                                      <th>Amount</th>
                                      <th>Fees paid on</th>
                                      <th>Next fee due on</th>
                                       <th>Invoices</th>
                                  </tr>
                                </tfoot>
                              </table>
                            </div>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </section>
                
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