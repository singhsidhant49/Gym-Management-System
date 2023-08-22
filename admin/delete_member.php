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
$query ="delete from members where mid='".$id."'";


   if(mysqli_query($conn,$query))
    {
     $_SESSION['deletemem_success']=" Member Deleted Successfully"
   
    
    ?>
     <script type="text/javascript">
    window.location="view_member.php";
    </script>
 <?php
    }
   else 
   {
        //echo 'saaa';exit;
      $_SESSION['deletemem_error']='Something Went Wrong';
    

?> 
<script type="text/javascript">
window.location="view_member.php";
</script>
    
 <?php 
}

?>
