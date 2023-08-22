<?php
session_start();
include'../connect.php';
$page='ppay';

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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Pending Payments</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pending Payments<li>
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
             <form action="reminder2.php" method="post">
          
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive ">
              
              <table id="example1" class="table table-bordered table-striped ">
               
                <thead>
                  
                <tr>
                       
                      <th>Serial No</th>
                      <th>Pending Date</th>
                      <th>Pending Amount</th>
                      <th>Customer Name</th>
                      <th>Contact No</th>
                    
                </tr>
                </thead>
                <tbody>
                 <?php
                 $num=1;
                    include '../connect.php';
                    $sql  = "select * from members where mid='".$_SESSION['id']."'";
                    $result = mysqli_query($conn,$sql);

                   
                    while($row = mysqli_fetch_assoc($result)) {
                      
                   
                              
                             $exp =$row['pendingdate'];
                             
                             if (!empty($exp)) {
                              
                             

                               $d=date('d-m-Y'); 
                                $td =strtotime("$d");
                                $expp  =strtotime("$exp");

                               
                                
                                   
 ?>

                    <tr>
                      
                      <td><?php echo $num; ?></td>
                     
                      <!-- <td><img src=" //echo $row['m_image']; ?>"height="150px" width="150px;"></td> --> 
                      <td><?php echo $row['pendingdate'];?></td>
                      <td>₹<?php echo $row['pendingpayment'];?></td>
                      <td><?php echo $row['cus_name']; ?></td>
                      <td><?php echo $row['contact']; ?></td>
                    </tr>
                    <?php
                    $num++;
                     
                   }
                 }?>
                </tbody>
            
                <tfoot>
                <tr>   
                      
                      <th>Serial No</th>
                
                      <th>Pending Date</th>
                      <th>Pending Amount</th>
                      <th>Customer Name</th>
                      <th>Contact No</th>
                      
                </tr>
                </tfoot>
              </table>
           
            </div>
            </div>
            <!-- /.card-body -->
            </form>
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
<?php include 'mscripts.php';?>
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
       
            <link rel="stylesheet" href="../admin/popup_style.css">


<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>

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

        
    
        
