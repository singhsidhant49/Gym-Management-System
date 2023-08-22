<?php
session_start();
if ($_SESSION['type']!=2) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
?>
<?php
include'../connect.php';
$page='pay';
$id=$_SESSION['id'];
$query="select * from members where mid='".$id."'";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result))
{
 $tcon= $row['contact'];

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
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h4 class="m-0 text-dark">Fees Receipt</h4>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Fees Receipt</li>
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
             
                      
                    <!-- ***************************transaction table****************************** -->
                    <section class="content">
                      <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header">
                              <h2 class="card-title font-weight-bold">Fees Receipt</h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <div class="table-responsive ">
                                <table id="example1" class="table table-bordered table-striped ">
                                  <thead>
                                    <tr>
                                      <th>Serial No</th>
                                      <th>Plan Name</th>
                                      <th>Months</th>
                                      <th>Amount</th>
                                      <th>Fees paid on</th>
                                      <th>Next fee due on</th>
                                      <th>Invoices</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $num=1;      
                                    $sql = "SELECT * FROM trans_his where contact='".$tcon."' ORDER BY tid desc ";
                                    $result = mysqli_query($conn,$sql);
                                    while($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                      <td><?php echo $num; ?></td>
                                      <td><?php echo $row['plan_name']; ?></td>
                                      <td><?php echo $row['month'];?></td>
                                      <td>₹<?php echo $row['amt']; ?></td>
                                      <td><?php echo $row['paid_da']; ?></td>
                                      <td><?php echo $row['expiry_da']; ?></td>
                                      <td><a href="invoice.php?tid=<?php echo $row['tid']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                                    </tr>
                                    <?php
                                    $num++;
                                    } ?>
                                  </tbody>
                                  <tfoot>
                                  <tr>  
                                      <th>Serial No</th>
                                      <th>Plan Name</th>
                                      <th>Months</th>
                                      <th>Amount</th>
                                      <th>Fees paid on</th>
                                      <th>Next fee due on</th>
                                      <th>Invoices</th>
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
            <!-- *****************transaction table end**************** -->
                </div>
              </div>
              <?php } ?>
            </div>
            <!-- ./wrapper -->
            <!-- jQuery -->
            <?php include 'mscripts.php'; ?>
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