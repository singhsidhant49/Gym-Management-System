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
$query ="delete from users where id='".$id."'";


   if(mysqli_query($conn,$query))
    {
     $_SESSION['delete_admin_success']=" Member Deleted Successfully"
   
    
    ?>
     <script type="text/javascript">
    window.location="view_admin.php";
    </script>
 <?php
    }
   else 
   {
        //echo 'saaa';exit;
      $_SESSION['delete_admin_error']='Something Went Wrong';
    

?> 
<script type="text/javascript">
window.location="view_admin.php";
</script>
    
 <?php 
}

?>
