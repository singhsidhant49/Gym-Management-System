<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}

include '../connect.php';

$id=$_GET['id'];
$query ="delete from enquiry where id='".$id."'";


   if(mysqli_query($conn,$query))
    {
     $_SESSION['deletemem_success']=" Enquiry Deleted Successfully";
   
    
    ?>
     <script type="text/javascript">
    window.location="view_enquiry.php";
    </script>
 <?php
    }
   else 
   {
        //echo 'saaa';exit;
      $_SESSION['deletemem_error']='Something Went Wrong';
    

?> 
<script type="text/javascript">
window.location="view_enquiry.php";
</script>
    
 <?php 
}

?>
