
<?php
include '../connect.php';
session_start();
$id=$_POST['modid'];
$query ="delete from posts where id='".$id."'";


   if(mysqli_query($conn,$query))
    {
      $_SESSION['deletepost_success']=" Post Deleted Successfully"
   
    
    ?>
     <script type="text/javascript">
    window.location="post_member.php";
    </script>
 <?php
    }
   else 
   {
        //echo 'saaa';exit;
      $_SESSION['deletepost_error']='Something Went Wrong';
    

?> 
<script type="text/javascript">
window.location="post_member.php";
</script>
    
 <?php 
}

?>
