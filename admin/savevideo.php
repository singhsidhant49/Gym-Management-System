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
if (isset($_POST['submit'])) 
{
                $image_name=$_FILES['image_name']['name'];
                $tmp_img=$_FILES['image_name']['tmp_name'];
                $path="images/videos/";
                move_uploaded_file($tmp_img,$path.$image_name);
                $insert=mysqli_query($conn,"insert into video(video) VALUES('$image_name')");
                if ($insert) 
                {
                  echo '<script>alert("Video Added Successfully")</script>';
                  echo '<script type="text/javascript">
    window.location="addvideo.php";
    </script>';
                }
                else{
                  echo '<script>alert("Failed")</script>';
                  echo '<script type="text/javascript">
    window.location="addvideo.php";
    </script>';
                }
              }
?>


