<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
$tt=$_GET['id'];
include 'head.php';
include '../connect.php';
 $q = "select * from prosale where id='".$tt."'" ;
      $result = mysqli_query($conn,$q);
      if($row = mysqli_fetch_array($result)) {
        
         
          $_SESSION['ndate']=$row['saledate'];
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
                  <h4>
                      <img src="images/01.png" height="100px" width="100px"><br>
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
                $qu="select * from prosale where id='".$tt."'";
                $result=mysqli_query($conn,$qu);
                if($row=mysqli_fetch_array($result))
                {
                ?>
                <div class="col-sm-4 invoice-col">
                  To

                  <address>
                      <strong><?php echo $row['cusname'];?></strong><br>
                    <strong> Invoice No: <?php echo $row['invoiceno'];?></strong><br>
                    <strong>Phone No: <?php echo $row['phoneno'];?></strong>
                    
                    
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
                     <th>Bill Number</th>
                      <th>Batch Number</th>
                     
                      <th>Product Name</th>
                
                   
                      <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                   <?php
                                        
                                    $sql = "select * from prosale where id='".$tt."'";
                                    $result = mysqli_query($conn,$sql);
                                    while($row = mysqli_fetch_assoc($result)) { 
                                      if (empty($row['cgst'])) {
                                        $cgs=0;

                                        $sgs=0;
                                      }
                                      else
                                      {
                                        $cgs=$row['cgst'];
                                        $sgs=$row['sgst'];
                                      }

                                       if (empty($row['discount'])) {
                                        $disc=0;

                                       }
                                       else{
                                        $disc=$row['discount'];
                                       }
                                      ?>


                                    <tr>
                                      
                                     <td><?php echo $row['id'];?></td>
                                      <td><?php echo $row['batchno'];?></td>
                                      
                                      <td><?php echo $row['proname'];?></td>
                                      <td>₹<?php echo $row['smrp'];?></td>
                                  </tr>
                                   
                    </tbody>
                  </table>
                </div>
          <!-- /.col -->
              </div>
              <!-- /.row -->

           
              <!-- this row will not appear when printing -->
              <div class="row no-print">
<div class="col-md-6 col-lg-6">
            
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Price:</th>
                        <td>₹<?php 
                     //   echo $row['smrp']-($row['smrp'] / (($row['gst']+$row['igst'])/100));
                       $p1= ($row['smrp'] / (1+(($row['gst']+$row['igst'])/100)));
                        echo $p1;
                        ?>
                        	
                        </td>
                      </tr>
                    
                      <tr>
                        <th>CGST (<?php echo ($row['gst']/2);?>%)</th>
                        <td>
                        	₹<?php
                        	$c1= ($row['smrp']-(($row['smrp'] / (1+($row['gst']/100)))))/2;
                        	echo $c1;
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <th>SGST (<?php echo $sgs;?>%)</th>
                        <td>
                        	₹<?php
                        	$s1= ($row['smrp']-(($row['smrp'] / (1+($row['gst']/100)))))/2;
                          echo $s1;
                        	?>
                        </td>
                      </tr>
                      
                      <tr>
                        <th>IGST (<?php echo $row['igst'];?>%)</th>
                        <td>
                        	₹<?php
                        	$i1= $row['smrp']-(($row['smrp'] / (1+($row['igst']/100))));
                        	echo $i1;
                          ?>
                        </td>
                      </tr>
                        <tr>
                        <th>Discount (<?php echo $disc;?>%)</th>
                        <td>- 
                          ₹<?php
                          $d= $row['excludedis'];
                          echo $d;
                          ?>
                        </td>
                      </tr>
                      
                      <tr>
                        <th>Total:</th>
                        <td>₹<?php 
                          echo ($p1+$c1+$s1+$i1)-$d;

                        ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
                 <?php
                                   
                  } ?> 

                <div class="col-md-6 col-lg-6">
                 
              
                <div class="float-right"> <img src="images/users/logoo.png"  style="width: 180px;"><br>
                 <h5 class="ml-4" style="font-size:15px;">SIGNATURE OF GRAVITY FITNESS</h5></div>
                  

                  
                </div>
              </div>


              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      
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
      
    </div>
    <strong>Copyright &copy; 2020-2021 <a href="#">GRAVITY FITNESS</a>.</strong> All rights
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
