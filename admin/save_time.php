<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
?>

<?php
include('../connect.php');
$timeslot=$_POST['pname'];
$tinum=$_POST['prate'];
$o="open";
$query = "select * from timeslot where timeslot='".$timeslot."'";
$result=mysqli_query($conn,$query);
if($row=mysqli_fetch_object($result))
  {
    $_SESSION['planerror']='Slot Already Exist';
  //  echo "email or contact Already exist";
   ?>
<script type="text/javascript">
window.location="add_slot.php";
</script>
 <?php
    }

 else
  {
$query="insert into timeslot(timeslot,nummember,status) value('" .$timeslot ."', '" .$tinum."','" .$o."')";
  

    
    if(mysqli_query($conn,$query))
    {
       $_SESSION['plansuccess']=' Slot Successfully Added';
   
    
    ?>
     <script type="text/javascript">
    window.location="view_slot.php";
    </script>
 <?php
}
   else {
        //echo 'saaa';exit;
      $_SESSION['planerror']='Something Went Wrong';
    

?> 
<script type="text/javascript">
window.location="view_slot.php";
</script>

    
 <?php 
}
}
?>


