

<?php
session_start();
include'../connect.php';
$contact=$_POST['contact'];
$cusname=$_POST['cust_name'];
$mplan=$_POST['plann'];
$rate=$_POST['mrate']; 
$pendingpayment=$_POST['pendingpayment'];
$pendingdate=$_POST['pendingdate'];

if(!empty($_POST['mmonth']))
{
$mon=$_POST['mmonth']; 
}
else
{
$mon=$_POST['mday']; 
}
$expp=$_POST['expdate'];




if(!empty($_POST['mmonth']))
{
 
    $nowdate=date('d-m-Y');
    //$d=strtotime("+".$mon." Months");
          $cdate=$expp; //due date
          $expiredate=date('d-m-Y', strtotime($expp. '+'.$mon.' Months')); //adding validity retrieve from plan to current date
          //inserting into enrolls_to table of corresponding userid
}
else
{

    $nowdate=date('d-m-Y');
    //$d=strtotime("+".$mon." Months");
          $cdate=$expp; //due date
          $expiredate=date('d-m-Y', strtotime($expp. '+'.$mon.' days')); //adding validity retrieve from plan to current date
          //inserting into enrolls_to table of corresponding userid

}

        

  


   if(!empty($_POST['mmonth']))
{
      $query=" UPDATE members SET plan='".$mplan."',amount='".$rate."',months='".$mon." Months',paid_date='".$cdate."',expiry_date='".$expiredate."',pendingpayment='".$pendingpayment."',pendingdate='".$pendingdate."' WHERE contact='".$contact."'";

}
else
{

     $query=" UPDATE members SET plan='".$mplan."',amount='".$rate."',months='".$mon." Days',paid_date='".$cdate."',expiry_date='".$expiredate."',pendingpayment='".$pendingpayment."',pendingdate='".$pendingdate."' WHERE contact='".$contact."'";
 
}


    if(mysqli_query($conn,$query))
    {
       $_SESSION['mkpay_success']=' payment Added Successfully';
 
        


                    if(!empty($_POST['mmonth']))
{
     $query1="insert into trans_his(contact,paid_da,expiry_da,plan_name,amt,month,nowdate)
       value('".$contact."',   '".$cdate."','".$expiredate."','".$mplan."','".$rate."','".$mon." Months','".$nowdate."')";
        mysqli_query($conn,$query1); 
        
        
}
else
{

          $query1="insert into trans_his(contact,paid_da,expiry_da,plan_name,amt,month,nowdate)
       value('".$contact."',   '".$cdate."','".$expiredate."','".$mplan."','".$rate."','".$mon." Days','".$nowdate."')";
        mysqli_query($conn,$query1);  
}

       

    ?>
      <script type="text/javascript">
    window.location="due_payments.php";
    </script> 
 <?php
    }
   else 
   {
        //echo 'saaa';exit;
      $_SESSION['mkpay_error']='Something Went Wrong';
    

?> 
<script type="text/javascript">
window.location="due_payments.php";
</script>
    
 <?php 
}

?>


