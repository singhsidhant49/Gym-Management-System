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
$page='vienq';
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
   <!--  side bar end -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Enquiry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Enquiry<li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
               <h3 class="card-title"><a href="add_enquiry.php" class="btn btn-primary">Add Enquiry</a></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive ">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                <tr>
                      <th>Serial No</th>
                      <th>Customer Name</th>
                      <th>Contact no</th>
                      <th>Age</th>
                      <th>Gender</th>

                      <th>Enquiry Date</th>
                      <th>Info</th>
                      <th>Action</th>
                      
                </tr>
                </thead>
                <tbody>
                 <?php
                 $num=1;
                    include '../connect.php';
                    $sql = "SELECT * FROM enquiry";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <?php $rows=$row['id'];?>
                      <td><?php echo $num; ?></td>
                      <td><?php echo $row['cus_name']; ?></td> 
                      <td><a href="tel:<?php echo $row['contact'];?>"><?php echo $row['contact'];?></a></td>
                      <td><?php echo $row['age']; ?></td>
                      <td><?php echo $row['gender']; ?></td>
                      <td><?php echo $row['enq_date']; ?></td>
                       <td><?php echo $row['info']; ?></td>
                        <td><?php echo "<a href='delete_enquiry.php?id=$rows'><button type='button' class='btn btn-danger bt mb-1'><i class='fa fa-trash'  aria-hidden='true'></i></button></a>" ?></td>
                    </tr>
                    <?php
                    $num++;
                     } ?>
                </tbody>
                <tfoot>
                <tr>  <th>Serial No</th>
                      <th>Customer Name</th>
                      <th>Contact no</th>
                      <th>Age</th>
                      <th>Gender</th>
                      <th>Enquiry Date</th>
                      <th>Info</th>
                      <th>Action</th>
                      
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include 'scripts.php';?>
<!-- page script -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
<!-- =======================popup alert======================================= -->
<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<!-- =============================error used in add_enquiry.php======================== -->
<!-- ***************************popup alert for delete ********************************* -->
<?php if(!empty($_SESSION['deletemem_success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
    Success
    </h1>
    <p><?php echo $_SESSION['deletemem_success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION['deletemem_success']);
} ?>

<?php if(!empty($_SESSION['deletemem_error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
    Error
    </h1>
    <p><?php echo $_SESSION['deletemem_error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["deletemem_error"]);  } ?> 

<!-- *********************************************************************************** -->
<!-- <?php //if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php// echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php// unset($_SESSION["error"]);  } ?> -->
<!-- ======================================================================================= -->
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
