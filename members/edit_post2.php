<?php
include'../connect.php';
session_start();
         $current_date = date('d/m/Y');
     // if (isset($_POST['edit_post']))
    //  {
        $edit_post_id=$_POST['post_id'];
        $edit_post_category=$_POST['post_category'];
        $edit_post_title=$_POST['post_title'];
      //  $edit_post_title = mysqli_real_escape_string($conn,$edit_post_title);
        $edit_post_autor=$_POST['post_autor_edit'];
        $edit_post_date=$_POST['post_date_edit'];
     //   $edit_post_edit_date=$_POST['post_edit_date_edit'];
        //$edit_post_image=$_POST['post_image_edit'];
        $ima = $_FILES["new_post_image"];
        $imb = $_FILES["new_post_image1"];
        $imc = $_FILES["new_post_image2"];
        $imd = $_FILES["new_post_image3"];
       

        $edit_post_text=$_POST['post_text_edit'];
        $edit_post_tag=$_POST['post_tag_edit'];
        $edit_post_visit_counter=$_POST['post_visit_counter_edit'];
        $edit_post_status=$_POST['post_status_edit'];
        $edit_post_priority=$_POST['post_priority_edit'];


if (in_array(null, $ima, true) || in_array('', $ima, true)) {


  
        $sql_edit_post = "UPDATE posts SET post_category='".$edit_post_category."', post_title='".$edit_post_title."', post_autor='".$edit_post_autor."',post_date='".$edit_post_date."',post_edit_date='".$current_date."',post_text='".$edit_post_text."', post_tag='".$edit_post_tag."', post_visit_counter='".$edit_post_visit_counter."', post_status ='".$edit_post_status."', post_priority = '".$edit_post_priority."' WHERE id='".$edit_post_id."'";
}
else
{


$filename= $ima['name'];
 $fileerror=$ima['error'];
 $filetmp=$ima['tmp_name'];
 $destinationfile='../admin/images/blog/'.$filename;


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
  $filename="";
 }

        $sql_edit_post = "UPDATE posts SET post_category='".$edit_post_category."', post_title='".$edit_post_title."', post_autor='".$edit_post_autor."',post_date='".$edit_post_date."',post_edit_date='".$current_date."', post_image='".$filename."',post_text='".$edit_post_text."', post_tag='".$edit_post_tag."', post_visit_counter='".$edit_post_visit_counter."', post_status ='".$edit_post_status."', post_priority = '".$edit_post_priority."' WHERE id='".$edit_post_id."'";


}
        $result_sql_edit_post= mysqli_query($conn, $sql_edit_post);
        
   if (in_array(null, $imb , true) || in_array('', $imb, true))
{

}
else
{
  $filename1= $imb['name'];
$fileerror=$imb['error'];
$filetmp1=$imb['tmp_name'];
$destinationfile1='../admin/images/blog/'.$filename1;


function correctImageOrientatio($filename1) {
  if (function_exists('exif_read_data')) {
    $exif = exif_read_data($filename1);
    if($exif && isset($exif['Orientation'])) {
      $orientation = $exif['Orientation'];
      if($orientation != 1){
        $img = imagecreatefromjpeg($filename1);
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
        // then rewrite the rotated image back to the disk as $filename1 
        imagejpeg($img, $filename1, 95);
      } // if there is some rotation necessary
    } // if have the exif orientation info
  } // if function exists      
}




move_uploaded_file($filetmp1, $destinationfile1);
correctImageOrientatio($destinationfile1);
 if(empty($filename1))
 {
  $filename1="";
 }

 

      $que="UPDATE posts SET post_image1='".$filename1."'";
     mysqli_query($conn,$que);
  
}

if (in_array(null, $imc , true) || in_array('', $imc, true))
{

}
else
{
  $filename2= $imc['name'];
 $fileerror=$imc['error'];
 $filetmp2=$imc['tmp_name'];
 $destinationfile2='../admin/images/blog/'.$filename2;


function correctImageOrientati($filename2) {
  if (function_exists('exif_read_data')) {
    $exif = exif_read_data($filename2);
    if($exif && isset($exif['Orientation'])) {
      $orientation = $exif['Orientation'];
      if($orientation != 1){
        $img = imagecreatefromjpeg($filename2);
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
        // then rewrite the rotated image back to the disk as $filename2 
        imagejpeg($img, $filename2, 95);
      } // if there is some rotation necessary
    } // if have the exif orientation info
  } // if function exists      
}




move_uploaded_file($filetmp2, $destinationfile2);
correctImageOrientati($destinationfile2);
 if(empty($filename2))
 {
  $filename2="";
 }


      $que="UPDATE posts SET post_image2='".$filename2."'";
     mysqli_query($conn,$que);
  
}

if (in_array(null, $imd , true) || in_array('', $imd, true))
{

}
else
{
 $filename3= $imd['name'];
 $fileerror=$imd['error'];
 $filetmp3=$imd['tmp_name'];
 $destinationfile3='../admin/images/blog/'.$filename3;


function correctImageOrientat($filename3) {
  if (function_exists('exif_read_data')) {
    $exif = exif_read_data($filename3);
    if($exif && isset($exif['Orientation'])) {
      $orientation = $exif['Orientation'];
      if($orientation != 1){
        $img = imagecreatefromjpeg($filename3);
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
        // then rewrite the rotated image back to the disk as $filename3 
        imagejpeg($img, $filename3, 95);
      } // if there is some rotation necessary
    } // if have the exif orientation info
  } // if function exists      
}




move_uploaded_file($filetmp3, $destinationfile3);
correctImageOrientat($destinationfile3);
 if(empty($filename3))
 {
  $filename3="";
 }

      $que="UPDATE posts SET post_image3='".$filename3."'";
     mysqli_query($conn,$que);
   
}




        if (!$result_sql_edit_post)
                {
                   
                   //die("Error description:" . mysqli_error());
                         $_SESSION['editpost_error']=" Something Went Wrong";
                      header("Location: post_member.php");        
                }

                else
                {
                $_SESSION['editpost_success']=" Post Updated Successfully";
                 header("Location: post_member.php");
                }
    //  }
     ?>
