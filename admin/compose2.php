<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}

include'../connect.php';
if(isset($_POST['submitt']))
{
$selected_val = $_POST['sel1'];  // Storing Selected Value In Variable
$message=$_POST['msg'];
if($selected_val=="titan")
{


 $sql = "SELECT * FROM members";
                    $re = mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($re)) 
         
              { 


 $tcon= $row['contact'];


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
$_SESSION['compose_send_success']="Message Send Successfully";
 header('Location:home.php');

}

else
{

$query="select * from members where mid='".$selected_val."'";
$result=mysqli_query($conn,$query);
if($row=mysqli_fetch_array($result))
{
  $tcon= $row['contact'];

// Declare the security credentials to use
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


$_SESSION['compose_send_success']="Message Send Successfully";
header('Location:home.php');
}
else
{
$_SESSION['compose_send_error']="Message Send failed";
		
 header('Location:home.php');
}

}}


?>