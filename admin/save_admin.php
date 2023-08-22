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


  $current_date = date('d/m/Y');
      if (isset($_POST['save_user']))
      {
        $ima=$_FILES['user_image'];
        $add_user_name=$_POST['user_name'];
        $add_user_username=$_POST['user_username'];
        $add_user_email=$_POST['user_email'];
        $add_user_password=$_POST['user_password'];
        $add_user_gender=$_POST['user_gender'];
        $add_user_address=$_POST['user_address'];
        //$add_user_image=$_POST['user_image'];

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
 if(empty($filename))
 {
  $filename="user1.png";
 }

    //   
        $add_user_status=$_POST['user_status'];
        $add_user_type=$_POST['user_type'];

$query="select name and username from users where username='".$add_user_username."'";
$result=mysqli_query($conn,$query);
if($row=mysqli_fetch_object($result))
  {
    $_SESSION['add_adm_error']='Member Already Exist';
  //  echo "email or contact Already exist";
    header("location:add_admin.php");
   ?>
 <?php
    }

 else
  {
      $query = "INSERT INTO users(name,username,email,password,gender,image,status,type,address) VALUES('$add_user_name', '$add_user_username', '$add_user_email', '$add_user_password', '$add_user_gender', '$filename','$add_user_status', '$add_user_type','$add_user_address')";
      
      
    if(mysqli_query($conn,$query))
    {
       $_SESSION['add_adm_success']=' Member Added Successfully';  
    ?>
      <script type="text/javascript">
    window.location="view_admin.php";
    </script> 
 <?php
    }
   else 
   {
        //echo 'saaa';exit;
      $_SESSION['add_adm_error']='Something Went Wrong';
    

?> 
<script type="text/javascript">
window.location="add_admin.php";
</script>
    
 <?php 
}
}
}
?>