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

include'../connect.php';
$ima=$_FILES['imge'];
$cusname=$_POST['cust'];
$contact=$_POST['con'];
$alcontact=$_POST['alcon'];
$email=$_POST['email'];
$pass=$_POST['memberpass'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$add=$_POST['address'];
$hfeet=$_POST['feet'];
//$hinch=$_POST['inches'];
$weight=$_POST['weight'];
$bmi2=$_POST['bmi2'];
$bmr=$_POST['bmr'];
$fat=$_POST['fat'];
$bp=$_POST['bp'];
$fitnessgoal=implode(',', $_POST['fitnessgoal']);
$medhis=$_POST['medi'];
$jd=$_POST['jd'];
$mplan=$_POST['plann'];
$sta=$_POST['status'];
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
$mtype=$_POST['mtype'];
$nowdate=date('d-m-Y');

 $filename= $ima['name'];
 $fileerror=$ima['error'];
 $filetmp=$ima['tmp_name'];
 $destinationfile='images/users/'.$filename;

 if (empty($rate) OR empty($mon)) {
    //not logged in/not admin
    //redirect to homepage
  $_SESSION['new_mem_error']='Plan or rate is not selected Successfully please try again';
    header("Location:new_member.php");
    die();
}

if(!empty($filename))
{
function correctImageOrientation($filename) {
  if (function_exists('exif_read_data')) {
    $exif = exif_read_data($filename);
    if($exif && isset($exif['Orientation'])) {
      $orientation = $exif['Orientation'];
      if($orientation != 1){
        $img = imagecreatefromjpeg($filename);
        $deg = 0;
        switch ($orientation) {
          case 3:
            $deg = 180;
            break;
          case 6:
            $deg = 270;
            break;
          case 8:
            $deg = 90;
            break;
        }
        if ($deg) {
          $img = imagerotate($img, $deg, 0);        
        }
        // then rewrite the rotated image back to the disk as $filename 
        imagejpeg($img, $filename, 95);
      } // if there is some rotation necessary
    } // if have the exif orientation info
  } // if function exists      
}




move_uploaded_file($filetmp, $destinationfile);
correctImageOrientation($destinationfile);
}
 if(empty($filename))
 {
  $filename="user1.png";
 }

 

if(!empty($_POST['mmonth']))
{

    $d=strtotime($jd."+".$mon." Months");//jd add kia ha joinign date se connect krne ke lie
          //$cdate=date("d-m-Y"); //current date
          $cdate=$jd;
          $expiredate=date("d-m-Y",$d); //adding validity retrieve from plan to current date
          //inserting into enrolls_to table of corresponding userid 
}
else
{

    $d=strtotime($jd."+".$mon." days");//jd add kia ha joinign date se connect krne ke lie
          //$cdate=date("d-m-Y"); //current date
          $cdate=$jd;
          $expiredate=date("d-m-Y",$d); //adding validity retrieve from plan to current date
          //inserting into enrolls_to table of corresponding userid 
}

      

$query="select cus_name and contact from members where contact='".$contact."'";
$result=mysqli_query($conn,$query);
if($row=mysqli_fetch_object($result))
  {
    $_SESSION['new_mem_error']='Member Already Exist';
  //  echo "email or contact Already exist";
   ?>
 <script type="text/javascript">
window.location="new_member.php";
</script> 
 <?php
    }

 else
  {
  
    if(!empty($_POST['mmonth']))
{
    $query="insert into members(m_image,cus_name,contact,alcontact,email,password,gender,dob,address,h_feet,weight,bmi2,bmr,fat,bp,fitnessgoal,medicalhistory,joining_date,plan,status,paid_date,expiry_date,amount,months,type,pendingpayment,pendingdate) value('" .$filename."', '" .$cusname."','".$contact."','".$alcontact."','".$email."','".$pass."','".$gender."','".$dob."','".$add."','".$hfeet."','".$weight."','".$bmi2."','".$bmr."','".$fat."','".$bp."','".$fitnessgoal."','".$medhis."','".$jd."','".$mplan."','".$sta."','".$cdate."','".$expiredate."','".$rate."','".$mon." Months','".$mtype."','".$pendingpayment."','".$pendingdate."')";
}
else
{

    $query="insert into members(m_image,cus_name,contact,alcontact,email,password,gender,dob,address,h_feet,weight,bmi2,bmr,fat,bp,fitnessgoal,medicalhistory,joining_date,plan,status,paid_date,expiry_date,amount,months,type,pendingpayment,pendingdate) value('" .$filename."', '" .$cusname."','".$contact."','".$alcontact."','".$email."','".$pass."','".$gender."','".$dob."','".$add."','".$hfeet."','".$weight."','".$bmi2."','".$bmr."','".$fat."','".$bp."','".$fitnessgoal."','".$medhis."','".$jd."','".$mplan."','".$sta."','".$cdate."','".$expiredate."','".$rate."','".$mon." Days','".$mtype."','".$pendingpayment."','".$pendingdate."')"; 
}

  
  
    if(mysqli_query($conn,$query))
    {
       $_SESSION['new_mem_success']=' Member Added Successfully';

            if(!empty($_POST['mmonth']))
{
     $query1="insert into trans_his(contact,paid_da,expiry_da,plan_name,amt,month,nowdate)value('".$contact."',
       '".$cdate."','".$expiredate."','".$mplan."','".$rate."','".$mon." Months','".$nowdate."')";
        mysqli_query($conn,$query1); 
      
}
else
{

     $query1="insert into trans_his(contact,paid_da,expiry_da,plan_name,amt,month,nowdate)value('".$contact."',
       '".$cdate."','".$expiredate."','".$mplan."','".$rate."','".$mon." Days','".$nowdate."')";
        mysqli_query($conn,$query1); 
}

      

$tcon= $contact;

  $message = "Dear ".$cusname." Greetings! Thanks for choosing GRAVITY FITNESS for your fitness journey, Your userid is : ".$tcon." and Password is : ".$pass." Download App : https://rb.gy/h5xeiz";;
  
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
 
















    ?>
      <script type="text/javascript">
    window.location="view_member.php";
    </script> 
 <?php
    }
   else 
   {
        //echo 'saaa';exit;
      $_SESSION['new_mem_error']='Something Went Wrong';
    

?> 
<script type="text/javascript">
window.location="new_member.php";
</script>
    
 <?php 
}
}
?>


