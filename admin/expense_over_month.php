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
include'head.php';
include'../connect.php';
$month=$_GET['mm'];
$year=$_GET['yy'];

$query="select  members.cus_name,members.contact,members.joining_date,
trans_his.paid_da,trans_his.expiry_da,trans_his.plan_name,trans_his.month,trans_his.amt from 
members INNER JOIN trans_his ON members.contact=trans_his.contact
where trans_his.paid_da  like  '___".$month."-".$year."'";
                                              
                                     
$res=mysqli_query($conn,$query); ?>
<?php if (mysqli_affected_rows($conn) != 0) { 
  $totalamount=0;
                         
                         
  while($row = mysqli_fetch_array($res)) { 
     $totalamount=$totalamount+$row['amt']; } }  
?>
<?php
$query="select * from expense where date like  '___".$month."-".$year."'";
                                              
                                     
$res=mysqli_query($conn,$query); ?>
                  
        <!-- <div class="card-body"> -->
          <div class="table-responsive "> 
           <table id="example1" class="table table-bordered table-striped " cellspacing="0" cellpadding="0">
                       <?php if (mysqli_affected_rows($conn) != 0) { ?>
                        <thead>
                          <tr>
                           <th>serial no</th>
                            <th>Expense Date</th>
                          <th>Expense Name</th>
                         
                          <th> Expense Amount</th>
                            
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $num=1;
                          $expamount=0;
                         
                         
                          while($row = mysqli_fetch_array($res)) { ?>
                          
                          <tr>
                               <form name="hform" method="post" action="edit_member.php"> 
                            <td><?php echo $num; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['ename'];?></td>
                             <td><?php echo $row['eamount']; ?></td>
                           
                             
                          
                          </tr>
                         
                          <?php
                           $expamount=$expamount+$row['eamount'];
              
                          $num++;

                          } ?>
                        </tbody>
                        <tfoot>
                        
                           <th>serial no</th>
                            <th>Expense Date</th>
                          <th>Expense Name</th>
                         
                          <th> Expense Amount</th>
                            
                        
                      </tr>


                      <tr>
                        <?php
                          $monthName = date("F", mktime(0, 0, 0, $month, 10));
                        echo "<tr><td colspan=11 align='center'><h3>Total Expenses on ".$monthName." is ₹".$expamount."</h3></td></tr>";
                        ?>
                      </tr>
                       <tr>
                        <?php
                          $monthName = date("F", mktime(0, 0, 0, $month, 10));
                        echo "<tr><td colspan=11 align='center'><h3>Total Profit on ".$monthName." by removing expenses is ₹".($totalamount-$expamount)."</h3></td></tr>";
                        ?>
                      </tr>





                      </tfoot>

                    <?php } 

                    else
                    {


    $monthName = date("F", mktime(0, 0, 0, $month, 10));
    echo "<h2>No Expense Data found On ".$monthName." ".$year.", Total profit is ".$totalamount." </h2>";
                    }
                      ?>
                    
                    </table>
                  </div>
               <!--  </div> -->
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
  

<!-- =======================popup alert for save======================================= -->


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




   