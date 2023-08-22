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
$amt=$_POST['amt'];

    $query="insert into expense(date,ename,eamount) value('" .$enqdate ."', '" .$cusname."','".$amt."')";
  
    if(mysqli_query($conn,$query))
    {
       $_SESSION['success']=' Record Successfully Added';
   
    
    ?>
     <script type="text/javascript">
    window.location="expense_month.php";
    </script>
 <?php
}
   else {
        //echo 'saaa';exit;
      $_SESSION['error']='Something Went Wrong';
    

?> 
<script type="text/javascript">
window.location="add_expence.php";
</script>

    
 <?php 
}

?>


