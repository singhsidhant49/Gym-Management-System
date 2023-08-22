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
              <h4 class="m-0 text-dark">Id Card</h4>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Id Card</li>
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
                              <h2 class="card-title font-weight-bold ">Id Card</h2>
                            </div>
                            <!-- /.card-header -->
                          <div class="card-body">
                          <?php
$id=$_SESSION['id'];
$quer="select * from members where mid='".$id."'";
$result=mysqli_query($conn,$quer);
while($row=mysqli_fetch_assoc($result))
{
 $tcon= $row['contact'];

?>
                        <div class="row">
		<div class="col-lg-3 col-sm-6">

            <div class="card hovercard" style="color:black; border:4px solid black;" id="grad1">
                
                <div class="cardheader" style="padding-left:30px; padding-right:30px; padding-top:10px;">
                    <img src="id card logo.png">
                    <p style="font-size:12px; text-align:center;">
                    +91 7078068100, 7017967263
                  </p>
                </div>
                <div class="text-center">
                    <center><img style="border:4px solid white;" class="img-circle" alt="" src="../admin/images/users/<?php echo $row['m_image']; ?>" height="150px" width="150px"></center>
                </div>
                <br>
                <div class="info text-center">
                    <div class="desc" style="font-size:28px; color: white; font-weight: bold;"><?php echo $row['cus_name']; ?></div>
                    <div class="desc" style="font-size:20px; color: black;"><?php echo $row['contact']; ?></div>
                    <div class="desc" style="color: black;">Joining Date : <?php echo $row['joining_date']; ?></div>
                    <div class="desc" style="color: black;">Fitness Goal : <?php echo $row['fitnessgoal']; ?></div>
                </div>
                <br>
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
        
    