

<?php
include '../connect.php' ;
$pid=$_GET['q'];
if (!empty($pid)) {
    
$tdi=$pid / 2;

 


?>

<div class="form-group">
    <div class="row">
        <label class="col-sm-3 control-label">cgst:</label>
        <div class="col-sm-9">
            <input type="text" name="cgst" class="form-control" placeholder="cgst" value="<?php echo $tdi ?>" readonly>
        </div>
    </div>
</div>


<div class="form-group">
    <div class="row">
        <label class="col-sm-3 control-label">SGST:</label>
        <div class="col-sm-9">
            <input type="text" name="sgst" class="form-control" placeholder="sgst" value="<?php echo $tdi ?>" readonly>
            
        </div>
    </div>
</div>
<?php
}
?>
