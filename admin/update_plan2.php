
<?php
session_start();
include('../connect.php');
$idd=$_GET['idd'];
$uplname=$_POST['upname'];
$upldetail=$_POST['updetail'];
//$uplmonth=$_POST['upmonths'];

if(!empty($_POST['upmonths']))
{
$uplmonth=$_POST['upmonths'];
}
else 
{
$uplday=$_POST['updays'];
}



$uplrate=$_POST['uprate'];


if(!empty($_POST['upmonths']))
{
  $query="Update plan set plan_name='".$uplname."',plan_detail='".$upldetail."',month='".$uplmonth."',rate='".$uplrate."' where serial='".$idd."'";



}
else 
{

  $query="Update plan set plan_name='".$uplname."',plan_detail='".$upldetail."',days='".$uplday."',rate='".$uplrate."' where serial='".$idd."'";

}





if(mysqli_query($conn,$query))
  {
   
    $_SESSION['updateplansuccess']=' Plan updated Successfully';
  ?> 
<script type="text/javascript">
window.location="view_plan.php";
</script>
 <?php
    }

 else
  {
        $_SESSION['updateplanerror']='Plan update failed';    
   //   
   
    
    ?>
     <script type="text/javascript">
    window.location="view_plan.php";
    </script>
 <?php
}
  
?>
    
 


