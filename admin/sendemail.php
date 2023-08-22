4<?php
include'head.php';
include '../connect.php';
?>
<div id="loading"></div>
<?php
session_start();
$sql  = "select * from members where status='Active'";
$result = mysqli_query($conn,$sql);    
$count=0;              
while($row = mysqli_fetch_assoc($result)) 
{
   $exp =$row['expiry_date'];
   $cus=$row['cus_name'];
 //  echo "$exp <br>";
   $timestamp = strtotime($exp);
   $rexp = date('Y-m-d', $timestamp);
   //echo " this is my data $rexp";
   //echo "<br>";
                           
  $date=date_create("$rexp");
  date_sub($date,date_interval_create_from_date_string("5 days"));
   $prevdate= date_format($date,"Y-m-d");                            
//echo "$prevdate <br>";


       $d=date('Y-m-d'); 
       $td =strtotime("$d");
       $expp  =strtotime("$prevdate");
       if($td>$expp)
       {

            $uem=$row['email'];
            if($uem!="")
            {
              $count++;
              $to_email = $row['email'];
              $subject = "Reminder For Gym Fee Duedate";
              $txt = "Dear ".$cus." Greetings! Your Gym Fees Due Date is ".$exp.", Kindly Pay at earliest for continuation of your service.
Regards Gravity Fitness";
              $headers = "From: bishtsuraj04@gmail.com";    //change id to admin emailid


                mail($to_email,$subject,$txt,$headers);    
                
                $_SESSION['sentmail']=" Email Successfully Send to '$count' Members ";?>
                <script type="text/javascript">
window.location="home.php";
</script>
         <?php       
            }


        }
}                          
             
        
                                   
 ?>

