
<?php
session_start();
include('../connect.php');
$idd=$_GET['idd'];
$uplname=$_POST['nummem'];


$query="Update timeslot set nummember='".$uplname."' where id='".$idd."'";


if(mysqli_query($conn,$query))
  {
   
    $_SESSION['updateplansuccess']=' Plan updated Successfully';
  ?>
<script type="text/javascript">
window.location="view_slot.php";
</script>
 <?php
    }

 else
  {
        $_SESSION['updateplanerror']='Plan update failed';    
   //   
   
    
    ?>
     <script type="text/javascript">
    window.location="view_slot.php";
    </script>
 <?php
}
  
?>
    
 


