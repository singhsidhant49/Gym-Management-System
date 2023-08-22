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
$page='viplan';
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
            <h1>View Sales</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Sales<li>
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
              <a  href="sale.php" class="card-title btn  btn-primary">Add Sale</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive ">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                <tr>
                      <th>Serial No</th>
                      <th>Sale Date</th>
                      <th>Invoice No</th>
                      <th>Product Name</th>
                      <th>Batch No</th>
                      <th>Customer Name</th>
                      <th>Phone No</th>
                      <th>MRP</th>
                      <th>Discount</th>
                      <th>GST</th>
                      <th>CGST</th>
                      <th>SGST</th>
                      <th>IGST</th>
                      <th>Price(exculding gst)</th>
                      <th>Actions??</th>
                      

                      
                      
                </tr>
                </thead>
                <tbody>
                 <?php
                 $no=1;
                    include '../connect.php';
                    $sql = "SELECT * FROM prosale";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <!-- <td>//echo $row['serial']; ?></td> -->
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['saledate']; ?></td> 
                      <td><?php echo $row['invoiceno'];?></td>
                      <td><?php echo $row['proname']; ?></td>
                      <td><?php echo $row['batchno']; ?></td>
                      <td><?php echo $row['cusname']; ?></td>
                      <td><?php echo $row['phoneno']; ?></td>
                      <td><?php echo $row['smrp']; ?></td>
                          <td><?php if(!empty($row['discount'])){echo $row['discount'];}else{echo "0";} ?>%</td>
                      <td><?php echo $row['gst']; ?>%</td>
                    <td><?php if(!empty($row['cgst'])){echo $row['cgst'];}else{echo "0";} ?>%</td>
                                      <td><?php if(!empty($row['sgst'])){echo $row['sgst'];}else{echo "0";} ?>%</td>
                      <td><?php echo $row['igst']; ?>%</td>
                      <td><?php echo $row['exclude']; ?></td>

                      <td> <button class="btn btn-danger"><a href="delete_sale.php?id=<?php echo $row['id'];?>"class="text-white"><i class="fa fa-trash"></i></a></button> <a href="saleinvoice.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                      </td>
                    </tr>
                    <?php 
                      $no++;
                      } ?>
                </tbody>
                <tfoot>
                <tr>  
                                        <th>Serial No</th>
                      <th>Sale Date</th>
                      <th>Invoice No</th>
                      <th>Product Name</th>
                      <th>Batch No</th>
                      <th>Customer Name</th>
                      <th>Phone No</th>
                      <th>MRP</th>
                      <th>Discount</th>
                      <th>GST</th>
                      <th>CGST</th>
                      <th>SGST</th>
                      <th>IGST</th>
                      <th>Price(exculding gst)</th>
                      <th>Actions??</th>

                      
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
    <!-- ============================== -->
    <script>
    $(document).ready(function() {
      $('.bt').click(function() {
        var id = $(this).attr("id");
          $("#modid").val(id);
          $('#myModal').modal('show');
      });  




    });
    </script>
    <!-- ============================== -->
    <script>
    $(function () {
    $("#example1").DataTable({
    "responsive": false,
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
<!-- ***************************popup alert for delete ********************************* -->
<?php if(!empty($_SESSION['delete_admin_success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
    Success
    </h1>
    <p><?php echo $_SESSION['delete_admin_success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION['delete_admin_success']);
} ?>
<!-- =======================popup alert======================================= -->
<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['delete_sale_success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['plansuccess']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["delete_sale_success"]);  
} ?>
<!-- ==============error used in add_plan.php====================== -->

<!--  //if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p>// echo $_SESSION['planerror']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
// unset($_SESSION["planerror"]);  } ?> -->
<!-- ========================================================================== -->

<!-- =======================popup alert for update============================= -->
<?php if(!empty($_SESSION['updateplansuccess'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['updateplansuccess']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["updateplansuccess"]);  
} ?>
<!-- ==============error used for update====================== -->

<?php if(!empty($_SESSION['updateplanerror'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['updateplanerror']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["updateplanerror"]);  } ?>
























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
