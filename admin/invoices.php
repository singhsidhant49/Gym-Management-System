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
$tt=$_GET['tid'];
include 'head.php';
include '../connect.php';
 $q = "select * from trans_his where tid='".$tt."'" ;
      $result = mysqli_query($conn,$q);
      if($row = mysqli_fetch_array($result)) {
        
          $_SESSION['tvcon']=$row['contact'];
          $_SESSION['ndate']=$row['nowdate'];
        }

 ?>
<div id="loading"></div>
<body class="hold-transition sidebar-mini layout-fixed" onload="myFunction()">
<div class="wrapper">
    <?php include 'topnav_bar.php';?>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <?php include 'side_bar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content" >
      <div class="container-flui" id="invoice">
        <div class="row">
          <div class="col-12">
           


            <!-- Main content -->
            <div class="invoice p-3 mb-3" id="content">
              <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 style="text-align:center; text-decoration:underline;">Fees Receipt</h2>
                  <h4>
                      <img src="images/LOGO.png" height="80px" width="200px"><br>
                    <!--<i class="fas fa-globe"></i> Goyal Fitness Club-->
                    <small style="font-size:15px;" class="float-right">Computer Generate Date: <?php echo  $_SESSION['ndate'];?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>


              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>GRAVITY FITNESS,</strong><br>
                    Majri Road, Majri Mafi, Mohkampur, Dehradun<br>Uttarakhand, 247663<br>
                    +91 7078068100, 7017967263
                  </address>
                </div>
                <!-- /.col -->
                <?php
                $qu="select * from members where contact='".$_SESSION['tvcon']."'";
                $result=mysqli_query($conn,$qu);
                if($row=mysqli_fetch_array($result))
                {
                ?>
                <div class="col-sm-4 invoice-col">
                  To

                  <address>
                    <strong><?php echo $row['cus_name'];?></strong><br>
                    <?php echo $row['address'];?><br>
                    <?php echo $row['contact'];?>
                    
                  </address>
                </div>
              <?php }?>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      
                      <th>Plan name</th>
                      <th>Months / Days</th>
                      <th>Fees paid on</th>
                      <th>Next fee due on</th>
                      <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                   <?php
                                        
                                    $sql = "select * from trans_his where tid='".$tt."'" ;
                                    $result = mysqli_query($conn,$sql);
                                    while($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                      
                                     <td><?php echo $row['plan_name'];?></td>
                                      <td><?php echo $row['month'];?></td>
                                      <td><?php echo $row['paid_da'];?></td>
                                      <td><?php echo $row['expiry_da'];?></td>
                                      <td>₹<?php echo $row['amt'];?></td>
                                  </tr>
                                    <?php
                                   
                                    } ?> 
                    </tbody>
                  </table>
                  
                </div>
          <!-- /.col -->
              </div>
              <!-- /.row -->

           
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                 
                  <!-- <button class="btn btn-default" onclick="savefun()"><i class="fas fa-print"></i> Print</button> -->
              <!--     <button type="button" class="btn btn-primary float-left" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                 -->
                <div class="float-right"> <img src="images/users/logoo.png"  style="width: 180px;"><br>
                 <h4 style="font-size:15px;" class="ml-4">MANAGEMENT SIGNATURE</h4></div>

                  
                </div>
                
                  
              </div>
              <h4>Terms and Conditions :</h4>
                  <ul style="list-style-type:none;">
                      <li>(1) Membership is personal No adjustment of days missed No refund not transferable.</li>
                      <li>(2) After joining member remain absent can't be claimed for absentism.</li>
                      <li>(3) Each member is responsible for their health condition.</li>
                      <li>(4) We are not responsible for Personal valuables u left any loss or damage.</li>
                      <li>(5) Management reserve all rights to suspend any member at any time without explanation.</li>
                  </ul>
                  <p>I have read and understood all the Rules & Regulations of Gym and agree to abide by them strictly. In the event of my failure to do so,my membership may cancelled immediately and no claim for refund of membership fees,not even in par will be made by me.
</p>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
 <button class="btn btn-warning" id="downloadPdf">
            <b>Download Invoice</b>
          </button>
    </section>
    <br>
    <!-- /.content -->
  </div>
 <div id="editor"></div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2021-2022 <a href="#">GYM PRO</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include 'scripts.php';?>


</script>
  <script>
   document
      .getElementById("downloadPdf")
      .addEventListener("click", function download() {
        const element = document.getElementById("invoice");
        html2pdf()
          .from(element)
          .save();
      });
  </script>
