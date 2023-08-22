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
$id=$_GET['smd'];

$query="select * from purchase where id='".$id."'";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result))
{
 $invoice= $row['invoiceno'];

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
              <h1 class="m-0 text-dark">Purchase Details</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Purchase Details</li>
                </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
                </div><!-- /.container-fluid -->
              </div>
              <!-- /.content-header -->
              <!-- Container fluid  -->
              <div class="container-fluid">
                <!-- Start Page Content -->
              <section class="content">
                <!-- /# row -->
                <div class="row">
                     <div class="col-lg-1"></div>
                  <div class="col-lg-10">
                    <div class="card">
                      <div class="card-title">
                        
                      </div>
                      <div class="card-body">
                        <div class="input-states">
                         <form class="form-horizontal" action="#" method="post" name="Hform" enctype="multipart/form-data">
                            <input type="hidden" name="em" value="<?php echo $id ;?>">
                            
                          
                                                    

                             <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Purchase Date</label>
                              <div class="col-sm-9">
                                <input type="text"  value="<?php echo $row['purchasedate']; ?>"  class="form-control" required="" readonly>
                              </div>
                            </div>
                          </div>

                            <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Invoice No</label>
                              <div class="col-sm-9">
                                <input type="Number" name="con" class="form-control" value="<?php echo $row['invoiceno']; ?>" readonly="">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Party Name</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $row['partyname']; ?>" readonly="">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <label class="col-sm-3 control-label">Quantity</label>
                              <div class="col-sm-9">
                                <input type="text" value="<?php echo $row['quantity']; ?>"class="form-control" readonly>
                              </div>
                            </div>
                          </div>
                          
                       
                          </form>

                        </div>

                      </div>
                    </div>
                  </div>
                  
                </div>
              </section>
                  <section class="content">
                      <div class="row">
                           <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                          <div class="card">
                            <div class="card-header">
                              <h2 class="card-title font-weight-bold">All Products</h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <div class="table-responsive ">
                                <table id="example1" class="table table-bordered table-striped ">
                                  <thead>
                                    <tr>
                                      <th>Serial No</th>
                                      <th>Batch NO</th>
                                      <th>Product Name</th>
                                      <th>Purchase Mrp</th>
                                      <th>Discount</th>
                                       <th>Dis Amt.</th>
                                      <th>GST</th>
                                       <th>GST Amt.</th>
                                       <th>CGST</th>
                                       <th>CGST Amt.</th>
                                        <th>SGST</th>
                                         <th>SGST Amt.</th>
                                         <th>IGST</th>
                                         <th>IGST Amt.</th>
                                         <th>Price(excluding gst & amt)</th>
                                     </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $num=1;      
                                    $sql = "SELECT * FROM pur2 where invoices='".$invoice."'" ;
                                    $result = mysqli_query($conn,$sql);
                                    while($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                      <td><?php echo $num; ?></td>
                                      <td><?php echo $row['batchno']; ?></td>
                                      <td><?php echo $row['proname'];?></td>
                                      <td>
                                          <?php echo $row['mrp']; ?>
                                      </td>
                                     <td><?php
                                     
                                     if(!empty($row['discount'])){echo $row['discount'] ;}else{echo "0";} ?>%</td>
                                     
                                     
                                     <td><?php echo ($row['mrp'] * ($row['discount']/100));  ?></td>
                                     
                                      
                                      <td><?php echo $row['gst']; ?>%</td>
                                      <td><?php echo $row['mrp']-(($row['mrp'] / (1+($row['gst']/100))));  ?></td>
                                      <td><?php if(!empty($row['cgst'])){echo $row['cgst']; }else{echo "0";} ?>%</td>
                                      
                                      <td><?php echo ($row['mrp']-(($row['mrp'] / (1+($row['gst']/100)))))/2;  ?></td>
                                      
                                      
                                      <td><?php if(!empty($row['sgst'])){echo $row['sgst'];}else{echo "0";} ?>%</td>
                                      
                                      <td><?php echo ($row['mrp']-(($row['mrp'] / (1+($row['gst']/100)))))/2;  ?></td>
                                      
                                      
                                      <td><?php echo $row['igst']; ?>%</td>
                                      <td><?php echo ($row['mrp']-(($row['mrp'] / (1+($row['igst']/100)))))/2;  ?></td>
                                      
                                      <td><?php echo $row['exclude']; ?></td>
                                      
                                    </tr>
                                    <?php
                                    $num++;
                                    } ?>
                                  </tbody>
                                  <tfoot>
                                <tr>
                                      <th>Serial No</th>
                                      <th>Batch NO</th>
                                      <th>Product Name</th>
                                      <th>Purchase Mrp</th>
                                      <th>Discount</th>
                                      <th>Dis Amt.</th>
                                      <th>GST</th>
                                       <th>GST Amt.</th>
                                       <th>CGST</th>
                                       <th>CGST Amt.</th>
                                        <th>SGST</th>
                                         <th>SGST Amt.</th>
                                         <th>IGST</th>
                                         <th>IGST Amt.</th>
                                         <th>Price(excluding gst & amt)</th>
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