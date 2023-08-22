<?php 
include_once('../connect.php');
$id=$_GET['id1'];
$delete1=mysqli_query($conn,"delete from slider where id='$id'");
if ($delete1) 
{
	$redirect="Location:addslider.php";
	//header('Location:gallery.php');
	header($redirect);
}
 ?>