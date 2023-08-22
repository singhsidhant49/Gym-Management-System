<?php 
require('connect.php');

$date=date('Y-m-d');

$select="SELECT * FROM members";
$ok_default=mysqli_query($conn,$select);
$row_default=mysqli_num_rows($ok_default);

if($row_default>0){

while($e=mysqli_fetch_array($ok_default)){

  $date_values=$e['expiry_date'];
  
  $arrays=explode("-",$date_values);

  $dates_in_installmentss="$arrays[2]-$arrays[1]-$arrays[0]";
  
  $diffs=strtotime($dates_in_installmentss)-strtotime($date);

   $dayss=abs(floor($diffs/(60*60*24)));

 
  if(3==$dayss){

 $cus=$e['cus_name'];
 $expirydate=$e['expiry_date'];
    $tcon=$e['contact'];
     $message = "Dear ".$cus." Greetings! Your Gym Fees Due Date is ".$expirydate.", Kindly Pay at earliest for continuation of your service.
Regards Gravity Fitness";
     $username = "softeck";
     $password = "36c@C";
     $token="483503e3677e9689cde4f2eedc9d9a30";
     // Set the attributes of the message to sending

     $type     = "Text-1";
     $senderid = "SOFTEK";


    $route="2";
     // Build the URL to send the message to. Make sure the
     // message text and Sender ID are URL encoded. You can
     // use HTTP or HTTPS
     $url = "http://message.softtechsolution.in/httpapi/httpapi?" .
            "token=" .$token. "&" .
            "sender=" .urlencode($senderid). "&" .
            "number="  .$tcon. "&" .
            "route=" .urldecode($route). "&" .
            "type=" .$type. "&" .
            "sms=" .urlencode($message);

     // Send the request
      $output = file($url);
      $result = explode(":", $output[0]);


  }

}

}

?>