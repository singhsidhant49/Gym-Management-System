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
$page='vimem';
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
    <!--  side bar end-->
  <!-- ==================modal for comform delete============================= -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ARE YOU SURE??</h4>
          
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <form name="modalform" action="delete_member.php" method="post">
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

                             <!--  =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>View Member</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">View Member<li>
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
                    <h3 class="card-title"><a href="new_member.php" class="btn btn-primary">Add Member</a></h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="table-responsive ">
                      <table id="example1" class="table table-bordered table-striped " cellspacing="0" cellpadding="0">
                        <thead>
                          <tr>
                            <th>Serial No</th>
                            <th>Customer Photo</th>
                            <th>Customer Name</th>
                            <th>Contact no</th>
                            <th>Selected Plan</th>
                            <th>Joining Date</th>
                            <th>Expiry Date</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $num=1;
                          include '../connect.php';
                          $sql = "SELECT * FROM members";
                          $result = mysqli_query($conn,$sql);
                          while($row = mysqli_fetch_assoc($result)) { ?>
                          
                          <tr>
                               <form name="hform" method="post" action="edit_member.php"> 
                            <td><?php echo $num; ?></td>
                            <td><img src="images/users/<?php echo $row['m_image']; ?>"  class="" width="150px" height="120px" ></td>
                            <td><?php echo $row['cus_name']; ?></td>
                            <td><a href="tel:<?php echo $row['contact'];?>"><?php echo $row['contact'];?></a></td>
                            <td><?php echo $row['plan']; ?></td>
                             <td><?php echo $row['joining_date']; ?></td>
                              <td><?php echo $row['expiry_date']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                             <td >
                             <table class="table-sm table-bordered bg-light"><tr>
                                 <td>   <a href="rejoin_makepayment.php?mp=<?php echo $row['mid'];?>"class="text-white btn btn-primary mb-1">Rejoining</a></td>
                            <td> <button type="button" id="<?php echo $row['mid']; ?>" class="btn btn-danger bt mb-1"><i class=" fa fa-trash"  aria-hidden="true"></i></button></td>

                            <input type="hidden" name="smd" value="<?php echo $row['mid']; ?>">
                         

                         <td>   <a href="member_detail.php?smd=<?php echo $row['mid'];?>"class="text-white btn btn-primary mb-1"><i class=" fas fa-info-circle"  aria-hidden="true"></i></a></td>
                         

                          <td><button type="submit" class="btn btn-success mb-1"><i class=" fa fa-edit"  aria-hidden="true"></i></button></td>
                              </tr>
                             </table>
  
                            </td> 
                            </form> 
                          </tr>
                         
                          <?php
                          $num++;
                          } ?>
                        </tbody>
                        <tfoot>
                        <tr> 
                          <th>Serial No</th>
                            <th>Customer Photo</th>
                            <th>Customer Name</th>
                            <th>Contact no</th>
                            <th>Selected Plan</th>
                            <th>Joining Date</th>
                            <th>Expiry Date</th>
                            <th>Status</th>
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
    <
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
<!-- =======================popup alert for save======================================= -->
<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['new_mem_success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
    Success
    </h1>
    <p><?php echo $_SESSION['new_mem_success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION['new_mem_success']);
} ?>
<!-- =============================error used in add_member.php======================== -->
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
<!-- =================================================================================== -->

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




<!-- ***************************popup alert for edit ********************************* -->
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