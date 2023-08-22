

<?php
session_start();
include('../connect.php');
$ima=$_FILES['im'];
$id=$_POST['em'];
$oldcon=$_POST['oldcon'];

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
$medhis=$_POST['medi'];
$jd=$_POST['jd'];


$sta=$_POST['status'];
if (in_array(null, $ima, true) || in_array('', $ima, true)) {

  
  $query=" UPDATE members SET cus_name='".$cusname."',contact='".$contact."',alcontact='".$alcontact."',email='".$email."',password='".$pass."',gender='".$gender."',dob='".$dob."',address='".$add."',h_feet='".$hfeet."',weight='".$weight."',bmi2='".$bmi2."',bmr='".$bmr."',fat='".$fat."',bp='".$bp."',medicalhistory='".$medhis."',joining_date='".$jd."',status='".$sta."'WHERE mid='".$id."'";
}
else
{


 $filename= $ima['name'];
 $fileerror=$ima['error'];
 $filetmp=$ima['tmp_name'];
 $destinationfile='images/users/'.$filename;
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


 


  $query=" UPDATE members SET m_image='".$filename."',cus_name='".$cusname."',contact='".$contact."',alcontact='".$alcontact."',email='".$email."',password='".$pass."',gender='".$gender."',dob='".$dob."',address='".$add."',h_feet='".$hfeet."',weight='".$weight."',bmi2='".$bmi2."',bmr='".$bmr."',fat='".$fat."',bp='".$bp."',medicalhistory='".$medhis."',joining_date='".$jd."',status='".$sta."'WHERE mid='".$id."'";

}


 
  if(mysqli_query($conn,$query))
    {
      if($contact!=$oldcon)
      {
        $q="update trans_his set contact='".$contact."' where contact='".$oldcon."'";
        mysqli_query($conn,$q);     
                      
      $_SESSION['editmembersuccess']=' record updated Successfully';
   }
   ?>
  <script type="text/javascript">
 window.location="view_member.php";
 </script>
  <?php
   }

  else
 {
         $_SESSION['editmembererror']='record update failed';    
    
   
    
     ?>
      <script type="text/javascript">
     window.location="view_member.php";
     </script>  
  <?php
 }
  
?>
    
 


