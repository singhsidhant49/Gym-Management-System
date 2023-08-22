

<?php
session_start();
include('../connect.php');
$ima=$_FILES['im'];
$id=$_POST['em'];
$cusname=$_POST['cust'];
$contact=$_POST['con'];
$email=$_POST['email'];
$pass=$_POST['memberpass'];
$gender=$_POST['gender'];
$sta=$_POST['status'];
$address=$_POST['address'];
if (in_array(null, $ima, true) || in_array('', $ima, true)) {

  
  $query=" UPDATE users SET name='".$cusname."',username='".$contact."',email='".$email."',password='".$pass."',gender='".$gender."',status='".$sta."',address='".$address."' WHERE id='".$id."'";
}
else
{


 $filename= $ima['name'];
 $fileerror=$ima['error'];
 $filetmp=$ima['tmp_name'];
 $destinationfile='images/users/'.$filename;
 move_uploaded_file($filetmp, $destinationfile);


  $query=" UPDATE users SET image='".$filename."', name='".$cusname."',username='".$contact."',email='".$email."',password='".$pass."',gender='".$gender."',status='".$sta."' ,address='".$address."' WHERE id='".$id."'";
}


 
  if(mysqli_query($conn,$query))
    {
   
      $_SESSION['editadminsuccess']=' record updated Successfully';
   ?>
  <script type="text/javascript">
 window.location="view_admin.php";
 </script>
  <?php
   }

  else
 {
         $_SESSION['editadminerror']='record update failed';    
    
   
    
     ?>
      <script type="text/javascript">
     window.location="view_admin.php";
     </script>  
  <?php
 }
  
?>
    
 


