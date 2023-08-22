<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}

include '../connect.php';
$id=$_GET['smd'];
$postid=$_GET['postid'];




$query ="delete from comments where id='".$id."'";


   if(mysqli_query($conn,$query))
    {
    
    
    ?>
     <script type="text/javascript">
    window.location="post.php?postid=<?php echo $postid ?>";
    </script>
 <?php
    }
   else 
   {
       

?> 
<script type="text/javascript">
window.location="post.php";
</script>
    
 <?php 
}

?>
