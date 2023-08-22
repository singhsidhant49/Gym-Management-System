

<?php
session_start();
$id=$_SESSION['id'];
include('../connect.php');
$ima=$_FILES['im'];

 $filename= $ima['name'];
 $fileerror=$ima['error'];
 $filetmp=$ima['tmp_name'];
 $destinationfile='../admin/images/users/'.$filename;
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





move_uploaded_file($filetmp, $destinationfile);
correctImageOrientation($destinationfile);


 


  $query=" UPDATE members SET m_image='".$filename."' WHERE mid='".$id."'";

}


 
  if(mysqli_query($conn,$query))
    {  
                      
      $_SESSION['editmembersuccess']=' record updated Successfully';
   
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
    
 


