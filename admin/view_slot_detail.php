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
$itd=$_GET['id'];
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
 <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ARE YOU SURE??</h4>
          
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <form name="modalform" action="delete_solt_detail.php" method="post">
        <div class="modal-body">
          <input type="hidden"  id="modid" name="modid">
          DO YOU WANT TO DELETE THIS RECORD ??
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger text-white">Delete</button>
                             
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </form>
        
      </div>
    </div>
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Slot</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Slot<li>
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
              <a  href="add_slot.php" class="card-title btn  btn-primary">Add slot</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive ">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                <tr>
                      <th>Serial No</th>
                      <th>customer Name</th>
                      <th>Delete Member</th>
                                             

                      
                      
                </tr>
                </thead>
                <tbody>
                 <?php

                 $no=1;
                    include '../connect.php';
                    
                         $q="select * from timeboook where sid='".$itd."'";
                        $re = mysqli_query($conn,$q);
                     while($row = mysqli_fetch_array($re))
                     {
                      ?>
                    
                    <tr>
                      <!-- <td><?php ///echo $row['serial']; ?></td> -->
                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['customer']; ?></td>
                      <td><button type="button" id="<?php echo $row['cid']; ?>" class="btn btn-danger bt mb-1"><i class=" fa fa-trash"  aria-hidden="true"></i></button></td> 
                      
                    </tr>
                    <?php 
                      $no++;
                      } ?>
                </tbody>
                <tfoot>
                <tr>    
                      <th>Serial No</th>  
                      <th>customer Name</th>
                      <th>Delete Member</th>
                                            
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
 <script>
    $(document).ready(function() {
      $('.bt').click(function() {
        var id = $(this).attr("id");
          $("#modid").val(id);
          $('#myModal').modal('show');
      });  




    });
    </script>
</body>
</html>
<!-- =======================popup alert======================================= -->
<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['plansuccess'])) {  ?>
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
<?php unset($_SESSION["plansuccess"]);  
} ?>
<!-- ==============error used in add_plan.php====================== -->

<!-- <?php //if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php// echo $_SESSION['planerror']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php// unset($_SESSION["planerror"]);  } ?> -->
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
