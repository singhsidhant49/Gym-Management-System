<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
include('../connect.php');
if (isset($_POST['btn_save'])) 
{
$saledate=$_POST['sale_date'];  
$invo=$_POST['invo'];
$proname=$_POST['pro_name'];
$batchno=$_POST['batch'];
$cusname=$_POST['cus_name'];
$phone=$_POST['num'];
$mrp=$_POST['mrp'];
$dis=$_POST['dis'];
$gst=$_POST['gst'];
$cgst=$_POST['cgst'];
$sgst=$_POST['sgst'];
$igst=$_POST['igst'];


 if(empty($proname))
 {
   $_SESSION['error']='Product is not selected Successfully please try again';
     header("Location:sale.php");
     die();
}

if(empty($igst))

{
// if (empty($cgst) OR empty($sgst)) {
//     //not logged in/not admin
//     //redirect to homepage
//   $_SESSION['error']='cgst or sgst is not selected Successfully please try again';
//     header("Location:sale.php");
//     die();
// }
}





$totalgst=$gst+$igst;


$exclude= ($mrp / (1+($totalgst/100)));
$excludee=($exclude * ($dis/100));
$query="insert into prosale(saledate,invoiceno,proname,batchno,cusname,phoneno,smrp,discount,gst,cgst,sgst,igst,exclude,excludedis) 
    value('" .$saledate."','" .$invo ."','" .$proname."','" .$batchno."','" .$cusname."','" .$phone."','".$mrp."','".$dis."','".$gst."','".$cgst."','".$sgst."','".$igst."','".$exclude."','".$excludee."')";
  
    if(mysqli_query($conn,$query))
    {
    

      $_SESSION['updateplansuccess']="record added sucessfully";

        ?>
<script type="text/javascript">
window.location="view_sale.php";
</script>

        <?php

    }
}
?>


