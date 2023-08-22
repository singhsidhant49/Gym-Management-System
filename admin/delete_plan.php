<?php
include '../connect.php';
$id=$_GET['id'];
$query ="delete from plan where serial='".$id."'";
mysqli_query($conn,$query);


header('location:view_plan.php');

?>