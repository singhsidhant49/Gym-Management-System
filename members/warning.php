
<?php
$sql  = "select * from members where status='Active' && mid='".$_SESSION['id']."'";
$result = mysqli_query($conn,$sql);                
if($row = mysqli_fetch_assoc($result)) 
{
   $exp =$row['expiry_date'];
 //  echo "$exp <br>";
   $timestamp = strtotime($exp);
   $rexp = date('Y-m-d', $timestamp);
   //echo " this is my data $rexp";
   //echo "<br>";
                           
  $date=date_create("$rexp");
  date_sub($date,date_interval_create_from_date_string("6 days"));
   $prevdate= date_format($date,"Y-m-d");                            
//echo "$prevdate <br>";


       $d=date('Y-m-d'); 
       $td =strtotime("$d");
       $expp  =strtotime("$prevdate");
       if($td>$expp)
       {

  $_SESSION['ready']="Your Gym fees is due on $exp, Kindly pay at earliest for continuation of your service.";        
        }
        
}                          
             
                                   
 ?>

