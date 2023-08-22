

<?php
include '../connect.php';
$id=$_GET['id'];
$query ="delete from prosale where id='$id'";

if(mysqli_query($conn,$query)){
 $_SESSION['delete_sale_success']=" Member Deleted Successfully"
?>
    <script type="text/javascript">
    window.location="view_sale.php";
    </script><?php
}


// header('location:view_sale.php');

?>