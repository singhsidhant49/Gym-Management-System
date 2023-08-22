<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}


include('../connect.php');
$purdate=$_POST['pur_date'];
$partyname=$_POST['party_name'];
$quantity=$_POST['quantity'];
$invo=$_POST['invo'];

    $query="insert into purchase(purchasedate,invoiceno,partyname,quantity) 
    value('" .$purdate ."','" .$invo."','" .$partyname."','".$quantity."')";
  
    if(mysqli_query($conn,$query))
    {
       $_SESSION['success']=' Record Successfully Added';
       $_SESSION['quan']=$quantity;
       $_SESSION['invo']=$invo;
       header("Location: addrec.php");
    
  
    ?>
     

   
 <?php

}
   else {
        //echo 'saaa';exit;
      $_SESSION['error']='Something Went Wrong';
    

?> 
<script type="text/javascript">
window.location="view_purchase.php";
</script>

    
 <?php 
}

?>


