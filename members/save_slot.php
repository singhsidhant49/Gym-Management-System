
<?php
session_start();
if ($_SESSION['type']!=2) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
?>

<?php
include('../connect.php');
$cust_id=$_SESSION['id'] ;
 $cust_name=$_SESSION['name'];
 $tid=$_POST['plann'];


                           $count=0;
                         $q="select * from timeboook where sid='".$tid."'";
                         $re = mysqli_query($conn,$q);
                     while($row = mysqli_fetch_array($re))
                     {
                     $count++;
                    }

$check=$count;



$qq="select * from timeslot where id='".$tid."'";
$res=mysqli_query($conn,$qq);
if($row=mysqli_fetch_array($res))
{
  $tname=$row['timeslot'];
  $mem=$row['nummember'];
}



if($check<$mem)
{

$query="insert into timeboook(sid,cid,customer,slot) value('" .$tid ."','" .$cust_id."','" .$cust_name."','" .$tname."')";
  

    
    if(mysqli_query($conn,$query))
    {
       $_SESSION['plansuccess']=' Slot Successfully Added';
   
    
    ?>
     <script type="text/javascript">
    window.location="bookslot.php";
    </script>
 <?php
}
   else {
        //echo 'saaa';exit;
      $_SESSION['planerror']='Something Went Wrong';
    

?> 
<!-- <script type="text/javascript">
window.location="view_slot.php";
</script> -->

    
 <?php 
}
}
else
{
   $_SESSION['error']="slot is full try another slot";
;
}
?>
<script type="text/javascript">
window.location="bookslot.php";
</script>



