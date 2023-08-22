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
$enqdate=$_POST['enquiry_date'];
$cusname=$_POST['customer_name'];
$contact=$_POST['contact'];
$age=$_POST['age'];
$info=$_POST['info'];
$gender=$_POST['gender'];
$query = "select cus_name and contact from enquiry where contact='".$contact."'";
$result=mysqli_query($conn,$query);
if($row=mysqli_fetch_object($result))
  {
    $_SESSION['error']='Contact Already Exist';
  //  echo "email or contact Already exist";
   ?>
<script type="text/javascript">
 window.location="add_enquiry.php";
</script>
 <?php
    }

 else
  {
    $query="insert into enquiry(enq_date,cus_name,contact,age,gender,info) value('" .$enqdate ."', '" .$cusname."','".$contact."','".$age."','".$gender."','".$info."')";
  
    if(mysqli_query($conn,$query))
    {
       $_SESSION['success']=' Record Successfully Added';
   
    
    ?>
     <script type="text/javascript">
    window.location="view_enquiry.php";
    </script>
 <?php
}
   else {
        //echo 'saaa';exit;
      $_SESSION['error']='Something Went Wrong';
    

?> 
<script type="text/javascript">
window.location="add_enquiry.php";
</script>

    
 <?php 
}
}
?>


