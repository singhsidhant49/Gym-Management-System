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
                $path="images/slider/";
                move_uploaded_file($tmp_img,$path.$image_name);
                $insert=mysqli_query($conn,"insert into slider(slider) VALUES('$image_name')");
                if ($insert) 
                {
                  echo '<script>alert("Slider Added Successfully")</script>';
                  echo '<script type="text/javascript">
    window.location="addslider.php";
    </script>';
                }
                else{
                  echo '<script>alert("Failed")</script>';
                  echo '<script type="text/javascript">
    window.location="addslider.php";
    </script>';
                }
              }
?>


