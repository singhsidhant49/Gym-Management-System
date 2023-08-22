<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
include'../connect.php';
if(!empty($_POST["rem"]))
{

	foreach ($_POST["rem"] as $rem)
	{
		$query="select * from members where mid='".$rem."'";
$result=mysqli_query($conn,$query);
if($row=mysqli_fetch_array($result))
{
 $tcon= $row['contact'];
 $cus=$row['cus_name'];
 $pendingpay=$row['pendingpayment'];
 $pendingdate=$row['pendingdate'];

	$message = "Dear ".$cus." Greetings! Your Pending Payment is ₹".$pendingpay." which is to paid on ".$pendingdate." , Kindly Pay at earliest for continuation of your service.
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

$_SESSION['remm2_success']="Reminder send successfully";
header('Location:home.php');
}
else
{
	$_SESSION['compose_send_error']="Please select atleast 1 member";
	header('Location:home.php');
}