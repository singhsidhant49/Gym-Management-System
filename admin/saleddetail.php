<?php
include '../connect.php' ;
$batchnum=$_GET['q'];

$query="select batchno , proname from pur2 where batchno='".$batchnum."'" ;

$result=mysqli_query($conn,$query);
if($row=mysqli_fetch_array($result))
{
    ?>
    <div class="form-group">
    <div class="row">
        <label class="col-sm-3 control-label">Product Name</label>
        <div class="col-sm-9">
            <input type="text" name="pro_name" class="form-control" placeholder="Product Name" value="<?php echo $row['proname']; ?>" readonly>
        </div>
    </div>
</div>
<?php  
}
else
{
    ?>
<div class="form-group">
    <div class="row">
        <label class="col-sm-3 control-label"></label>
        <div class="col-sm-9">
            <p class="bg-danger">product of this batchno is not available </p>
        </div>
    </div>
</div>
<?php
}
?>

