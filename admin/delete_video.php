<?php 
include_once('../connect.php');
$id1=$_GET['id2'];
$delete2=mysqli_query($conn,"delete from video where id='$id1'");
if ($delete2) 
{
	$redirect1="Location:addvideo.php";
	//header('Location:gallery.php');
	header($redirect1);
}
 ?>