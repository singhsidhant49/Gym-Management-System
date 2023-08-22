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
include('../connect.php');
$plname=$_POST['pname'];
$pldetail=$_POST['pdetail'];
if(!empty($_POST['pmonths']))
{
$plmonth=$_POST['pmonths'];
}
else 
{
$plday=$_POST['pdays'];
}
$plrate=$_POST['prate'];
$query = "select plan_name from plan where plan_name='".$plname."'";
$result=mysqli_query($conn,$query);
if($row=mysqli_fetch_object($result))
  {
    $_SESSION['planerror']='Plan Already Exist';
  //  echo "email or contact Already exist";
   ?>
<script type="text/javascript">
window.location="add_plan.php";
</script>
 <?php
    }

 else
  {
    if(!empty($_POST['pmonths']))
{
 $query="insert into plan(plan_name,plan_detail,month,rate) value('" .$plname ."', '" .$pldetail."','".$plmonth."','".$plrate."')";
  
}
else
{
$query="insert into plan(plan_name,plan_detail,days,rate) value('" .$plname ."', '" .$pldetail."','".$plday."','".$plrate."')";
  
}
    
    if(mysqli_query($conn,$query))
    {
       $_SESSION['plansuccess']=' Plan Successfully Added';
   
    
    ?>
     <script type="text/javascript">
    window.location="view_plan.php";
    </script>
 <?php
}
   else {
        //echo 'saaa';exit;
      $_SESSION['planerror']='Something Went Wrong';
    

?> 
<script type="text/javascript">
window.location="view_plan.php";
</script>

    
 <?php 
}
}
?>


