<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}

include '../connect.php';

$id=$_POST['modid'];
$query ="delete from purchase where invoiceno='".$id."'";


   if(mysqli_query($conn,$query))
    {

      $query1 ="delete from pur2 where invoices='".$id."'";

      mysqli_query($conn,$query1);


     $_SESSION['deletemem_success']=" Record Deleted Successfully"
   
    
    ?>
     <script type="text/javascript">
    window.location="view_purchase.php";
    </script>
 <?php
    }
   else 
   {
        //echo 'saaa';exit;
      $_SESSION['error']='Something Went Wrong';
    

?> 
<script type="text/javascript">
window.location="view_purchase.php";
</script>
    
 <?php 
}

?>
