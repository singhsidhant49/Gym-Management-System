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
$id=$_GET['id'];
$query="select * from timeslot where id='".$id."'";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result))

{
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
            <h1 class="m-0 text-dark">Update Slot</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Slot</li>
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
                                    <form class="form-horizontal" action="update_slot2.php?idd=<?php echo $id ;?>" method="POST" name="upform">

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Slot Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="<?php echo $row['timeslot'];?>"  class="form-control"  required readonly>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Number of Member</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nummem"value="<?php echo $row['nummember'];?>"  class="form-control"  required >

                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="btn_save" class="btn btn-primary mx-2 my-2 py-2 px-3 float-right">UPDATE</button>
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

