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
$query ="delete from timeboook where cid='".$id."'";


   if(mysqli_query($conn,$query))
    {
     $_SESSION['updateplansuccess']=" Member Deleted Successfully"
   
    
    ?>
     <script type="text/javascript">
    window.location="view_slot.php";
    </script>
 <?php
    }
   else 
   {
        //echo 'saaa';exit;
      $_SESSION['updateplanerror']='Something Went Wrong';
    

?> 
<script type="text/javascript">
window.location="view_slot_detail.php";
</script>
    
 <?php 
}

?>
