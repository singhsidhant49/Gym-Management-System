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
$query ="delete from timeslot where id='".$id."'";


   if(mysqli_query($conn,$query))
    {

$qu ="delete from timeboook where sid='".$id."'";


   mysqli_query($conn,$qu);   
  

     $_SESSION['updateplansuccess']=" slot Deleted Successfully"
   
    
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
window.location="view_slot.php";
</script>
    
 <?php 
}

?>
