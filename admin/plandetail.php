

<?php
include '../connect.php' ;
$pid=$_GET['q'];
$query="select * from plan where plan_name='".$pid."'";
$res=mysqli_query($conn,$query);
  
    if($row=mysqli_fetch_array($res))
    {
?>

<div class="form-group">
    <div class="row">
        <label class="col-sm-3 control-label">Rate :</label>
        <div class="col-sm-9">
            <input type="text" name="mrate" class="form-control" placeholder="Rate" value="<?php echo $row['rate'] ?>" readonly>
        </div>
    </div>
</div>

<?php
if(!empty($row['month']))
{
?>
<div class="form-group">
    <div class="row">
        <label class="col-sm-3 control-label">months :</label>
        <div class="col-sm-9">
            <input type="text" name="mmonth" class="form-control" placeholder="Rate" value="<?php echo $row['month'] ?>" readonly>
            
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
        <label class="col-sm-3 control-label">Days :</label>
        <div class="col-sm-9">
            <input type="text" name="mday" class="form-control" placeholder="Rate" value="<?php echo $row['days'] ?>" readonly>
            
        </div>
    </div>
</div>
<?php
}
}
?>
