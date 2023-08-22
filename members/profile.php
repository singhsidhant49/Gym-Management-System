<?php
session_start();
include'../connect.php';
$page='vienq';

if ($_SESSION['type']!=2) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
?>

<?php
include 'mhead.php';
?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include 'mtopnav_bar.php';?>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <?php include 'mside_bar.php'; ?>
    <!-- Main Sidebar Container End -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h4 class="m-0 text-dark">Profile</h4>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Profile</li>
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
             
                      
                    <!-- ***************************transaction table****************************** -->
                    <section class="content ">
                      <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header">
                              <h2 class="card-title font-weight-bold ">USER PROFILE </h2>
                            </div>
                            <!-- /.card-header -->
                          <div class="card-body">
                        <!--main content-->
                        <div class="row">
                          <?php
$id=$_SESSION['id'];
$quer="select * from members where mid='".$id."'";
$result=mysqli_query($conn,$quer);
while($row=mysqli_fetch_assoc($result))
{
 $tcon= $row['contact'];

?>
                            <div class="col-md-3 text-center">
                            <img class="img-fluid img-thumbnail" src="../admin/images/users/<?php echo $row['m_image']; ?>" >
                            </div>
                            
                            <form class="form-horizontal" action="" method="post" name="emform" enctype="multipart/form-data">
                            <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Change Picture</label>
                                <div class="col-sm-9"> 
                                  <input type="file" name="image_name" class="form-control">
                              </div>
                              </div>
                              <input type="submit" name="btn_save" class="btn btn-success mx-4 my-3" value="Update" onclick="return confirm('Are you Sure to change pic?')">
                            </div> 
                            </form>
                            <?php
                            if(isset($_POST['btn_save']))
                            {
                                include('../connect.php');
                                $image_name=$_FILES['image_name']['name'];
                                $tmp_img=$_FILES['image_name']['tmp_name'];
                                $path="../admin/images/users/";
                                move_uploaded_file($tmp_img,$path.$image_name);
                                $query="UPDATE members SET m_image='".$image_name."' WHERE mid='".$id."'";
                                
                                 
                                  if(mysqli_query($conn,$query))
                                    {  
                                                      
                                      echo '<script>alert("Picture Changed Successfully")</script>';
                                   
                                   ?>
                                  <script type="text/javascript">
                                 window.location="profile.php";
                                 </script>
                                  <?php
                                   }
                                
                                  else
                                 {
                                     echo '<script>alert("Failed")</script>';   
                                    
                                   
                                    
                                     ?>
                                      <script type="text/javascript">
                                     window.location="profile.php";
                                     </script>  
                                  <?php
                                 }
                            }
                            ?>
                            
                            <div class="col-md-9">
                              <div class="table-responsive ">
                                <table class="table table-bordered" class="usertable1">
                                    <tr>
                                        <td>Full Name:</td>
                                        <td><?php echo $row['cus_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile Number:</td>
                                        <td><?php echo $row['contact']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Emergency Number:</td>
                                        <td><?php echo $row['alcontact']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><?php echo $row['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Password:</td>
                                        <td><?php echo $row['password']; ?></td>
                                    </tr>
                                     <tr>
                                        <td>Gender:</td>
                                        <td><?php echo $row['gender']; ?></td>
                                    </tr>
                                   <tr>
                                        <td>Date Of Birth:</td>
                                        <td><?php echo $row['dob']; ?></td>
                                    </tr>
                                  
                                    <tr>
                                        <td>Address:</td>
                                        <td><?php echo $row['address']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Height:</td>
                                        <td><?php echo $row['h_feet']; ?> cm</td>
                                    </tr>
                                    <tr>
                                        <td>Weight:</td>
                                        <td><?php echo $row['weight']; ?> kg</td>
                                    </tr>
                                    <tr>
                                        <td>BMI:</td>
                                        <td><?php echo $row['bmi2']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td>BMR:</td>
                                        <td><?php echo $row['bmr']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td>FAT:</td>
                                        <td><?php echo $row['fat']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td>BP:</td>
                                        <td><?php echo $row['bp']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td>Fitness Goal:</td>
                                        <td><?php echo $row['fitnessgoal']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td>Medical History:</td>
                                        <td><?php echo $row['medicalhistory']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Joining Date:</td>
                                        <td><?php echo $row['joining_date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Current Status:</td>
                                        <td><?php echo $row['status']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Current Plan:</td>
                                        <td><?php echo $row['plan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Plan Amount:</td>
                                        <td>₹<?php echo $row['amount']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Plan Validity:</td>
                                        <td><?php echo $row['months']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fees Paid On:</td>
                                        <td><?php echo $row['paid_date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Next Fee Due On:</td>
                                        <td><?php echo $row['expiry_date']; ?></td>
                                    </tr>
                                </table>
                              </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
              
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </section>
                  <!-- /.content -->
            <!-- *****************transaction table end**************** -->
                </div>
            </div>
            <!-- ./wrapper -->
            <!-- jQuery -->
            <?php include'mscripts.php'; ?>   
            <!-- ***************************popup alert for edit ********************************* -->
            <link rel="stylesheet" href="../admin/popup_style.css">
<?php if(!empty($_SESSION['editmembersuccess'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
    Success
    </h1>
    <p><?php echo $_SESSION['editmembersuccess']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION['editmembersuccess']);
} ?>

<?php if(!empty($_SESSION['editmembererror'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
    Error
    </h1>
    <p><?php echo $_SESSION['editmembererror']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION['editmembererror']);  } ?> 

<!-- *********************************************************************************** -->

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
        
    