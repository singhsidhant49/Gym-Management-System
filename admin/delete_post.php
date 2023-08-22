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
$query ="delete from posts where id='".$id."'";


   if(mysqli_query($conn,$query))
    {
      $_SESSION['deletepost_success']=" Post Deleted Successfully"
   
    
    ?>
     <script type="text/javascript">
    window.location="post_admin.php";
    </script>
 <?php
    }
   else 
   {
        //echo 'saaa';exit;
      $_SESSION['deletpost_error']='Something Went Wrong';
    

?> 
<script type="text/javascript">
window.location="post_admin.php";
</script>
    
 <?php 
}

?>
