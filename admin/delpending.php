
<?php
session_start();
include('../connect.php');
$mp=$_GET['mp'];

$query="Update members set pendingpayment=' ',pendingdate=' ' where mid='".$mp."'";


if(mysqli_query($conn,$query))
  {
   
    $_SESSION['updateplansuccess']=' Plan updated Successfully';
  ?>
<script type="text/javascript">
window.location="pendingpay.php";
</script>
 <?php
    }

 else
  {
        $_SESSION['updateplanerror']='Plan update failed';    
   //   
   
    
    ?>
     <script type="text/javascript">
    window.location="pendingpay.php";
    </script>
 <?php
}
  
?>
    
 


