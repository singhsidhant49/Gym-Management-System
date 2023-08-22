
<?php
include '../connect.php' ;
$pid=$_GET['q'];
if($pid=="months")
{
?>

                                         <div class="form-group">
                                              <div class="row">
                                                <label class="col-sm-3 control-label">Months</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="pmonths" class="form-control" placeholder="Months" required="">
                                                </div>
                                            </div>
                                        </div>

<?php
}
elseif($pid=="days")
{
    ?>

     <div class="form-group">
                                              <div class="row">
                                                <label class="col-sm-3 control-label">Days</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="pdays" class="form-control" placeholder="Days" required="">
                                                </div>
                                            </div>
                                        </div>





    <?php

}
?>