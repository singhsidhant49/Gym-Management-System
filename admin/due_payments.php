<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}

$page='duepay';
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
            <h1>Due Payments</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Due Payments<li>
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
            <div class="card-header">
              <input type="submit" name="sub" class="btn btn-success btn-sm ml-2 " value=" Send Reminder">
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive ">
              
              <table id="example1" class="table table-bordered table-striped ">
               
                <thead>
                  
                <tr>
                       <th><div><input type="checkbox" id="select_all" /></div></th>
                      <th>Serial No</th>
                      <th>Customer Name</th>
                      <th>Contact No</th>
                      <th>Fees Paid On</th>
                      <th>Next Fees Due On</th>
                      <th>Action ??</th>
                      
                      
                </tr>
                </thead>
                <tbody>
                 <?php
                 $num=1;
                    include '../connect.php';
                    $sql  = "select * from members where status='Active'";
                    $result = mysqli_query($conn,$sql);

                   
                    while($row = mysqli_fetch_assoc($result)) {
                      
                   
                              
                             $exp =$row['expiry_date'];
                             
                               $d=date('d-m-Y'); 
                                $td =strtotime("$d");
                                $expp  =strtotime("$exp");
                               if($td>$expp||$td==$expp){
                                
                              
                             
            
                                   
 ?>

                    <tr>
                      <td><div><input type="checkbox"  name="rem[]" class="checkbox " value="<?php echo $row['mid'];?>"/></div></td>
                      <td><?php echo $num; ?></td>
                      <td><?php echo $row['cus_name']; ?></td>
                      <td><?php echo $row['contact']; ?></td>
                      <td><?php echo $row['paid_date'];?></td>
                      <!-- <td><img src="<?php //echo $row['m_image']; ?>"height="150px" width="150px;"></td> --> 
                      <td><?php echo $row['expiry_date'];?></td>
                      <td>
                        <table class="table-sm table-bordered bg-light">
                               <td><a href="makepayment.php?mp=<?php echo $row['mid'];?>" class="btn btn-primary"> Payment </a></td>

                                <td><a href="text_sms.php?smd=<?php echo $row['mid'];?>"class="text-white btn btn-success">Reminder</a></td>  
                                <td><a target="_blank" href="https://wa.me/91<?php echo $row['contact'] ?>?text=Dear <?php echo $row['cus_name']; ?> Greetings! Your Gym Fees Due Date is <?php echo $row['expiry_date'];?>, Kindly Pay at earliest for continuation of your service. %0aRegards Gravity Fitness" class="btn btn-success"><i class="fa fa-whatsapp" style="color:white; font-size: 18px;"></i></i></a></td>
                        
                         </table>
                      </td>
                    </tr>
                    <?php
                    $num++;
                     } 
                   }?>
                </tbody>
            
                <tfoot>
                <tr>   
                      <th>Check all</th>
                      <th>Serial No</th>
                      <th>Customer Name</th>
                      <th>Contact No</th>
                      <th>Fees Paid On</th>
                      <th>Next Fees Due On</th>
                      <th>Action ??</th>
                      
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
<?php include 'scripts.php';?>
<!-- page script -->
<script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>
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
<?php if(!empty($_SESSION['mkpay_success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['mkpay_success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["mkpay_success"]);  
} ?>
<!-- ======================================================================== -->

<?php if(!empty($_SESSION['mkpay_error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['mkpay_error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["mkpay_error"]);  } ?>
<!-- =================================================================================== -->

<?php if(!empty($_SESSION['text_send_success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['text_send_success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["text_send_success"]);  
} ?>
<!-- ======================================================================== -->

<?php if(!empty($_SESSION['text_send_error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['text_send_error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["text_send_error"]);  } ?>
<!-- =================================================================================== -->

<?php if(!empty($_SESSION['remm2_success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['remm2_success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["remm2_success"]);  
} ?>
<!-- ======================================================================== -->

<?php if(!empty($_SESSION['remm2_error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['remm2_error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["remm2_error"]);  } ?>
<!-- =================================================================================== -->
   
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
