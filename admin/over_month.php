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
include '../connect.php';
$month=$_GET['mm'];
$year=$_GET['yy'];
$flag=$_GET['flag'];

$query="";

if($flag==0)
	$query="select * from members where joining_date like '___".$month."-".$year."'";
else if($flag==1)
	$query="select * from  members where joining_date like '______".$year."'";

$res=mysqli_query($conn,$query);
                            

$sno    = 1;

if (mysqli_affected_rows($conn) != 0) { ?>
	 
	 

	  <table class="table table-bordered table-striped ">
                
            
            

	<thead>
                          <tr>
                            <th>Serial No</th>
                            <th>Customer Name</th>
                            <th>Contact no</th>
                            <th>Selected Plan</th>
                            <th>Status</th>
                            <th>Joining Date</th>
                            
                            
                          </tr>
                        </thead>
<?php
echo "<tbody border=1>"; 
    while ($row= mysqli_fetch_array($res)) { ?>
      					<tr>

                            <td><?php echo $sno; ?></td>
                            <td><?php echo $row['cus_name']; ?></td>
                            <td><?php echo $row['contact'];?></td>
                            <td><?php echo $row['plan']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['joining_date']; ?></td>
                </tr>

                <?php
                $sno++;
            
        
    }



echo "</tbody>";


?>
  <tfoot>
     <tr> 
     	<th>Serial No</th>
        <th>Customer Name</th>
        <th>Contact no</th>
        <th>Selected Plan</th>
        <th>Status</th>
         <th>Joining Date</th>                   
      </tr>
   </tfoot>
  </table>

         






<?php
}
else{
	if($flag==0){
		$monthName = date("F", mktime(0, 0, 0, $month, 10));
		echo "<h2>No Data found On ".$monthName." ".$year."</h2>";
	}
	else if($flag==1)
		echo "<h2>No Data found On ".$year."</h2";
}
?>
