<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
include'../connect.php';
$id=$_GET['smd'];
$query="select * from members where mid='".$id."'";
$result=mysqli_query($conn,$query);
if($row=mysqli_fetch_array($result))
{
 $tcon= $row['contact'];
 $cus=$row['cus_name'];
 $expirydate=$row['expiry_date'];

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
   

 
$_SESSION['text_send_success']="Message Send Successfully";
header('Location:due_payments.php');
}
else
{
$_SESSION['text_send_error']="Message Send Failed";
		
header('Location:due_payments.php');
}
?>