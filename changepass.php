<?php
session_start();

include'connect.php';



      if (isset($_POST['save_user'])) 
      {
      	$email=$_POST['em'];
      	$pass=$_POST['password'];

      	$query="UPDATE users SET password='".$pass."' where email='".$email."'";
      	if(mysqli_query($conn,$query))
      	{
      		$_SESSION['check']="password update successfully";
      		header("location:index.php");
      	}
      	else
      	{
      		$_SESSION['checkpass']="something went wrong";

      		header("location:index.php");	
      	}
      }
      ?>