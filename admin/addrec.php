<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}

      // $_SESSION['quan']=$quantity;
      //  $_SESSION['invo']=$invo;


if($_SESSION['quan']!=0)
{

 include 'head.php';
$page='pur';
include '../connect.php';

?>
<div id="loading"></div>
<body class="hold-transition sidebar-mini layout-fixed" onload="myFunction()">
  <div class="wrapper">
  <!-- Navbar -->
  <?php include 'topnav_bar.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php include 'side_bar.php'; ?>
  <!-- Main Sidebar Container End -->

  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
          <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Purchase detail </h1>
          </div><!-- /.col --> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                <div class="row">
                  <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                        <!--xxxxxxxxxxxxxxxxxxxx----FORM----xxxxxxxxxxxxxxxxxxxxx -->
                                    <form class="form-horizontal" method="POST" name="enqform">
                                        

                                           <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Batch Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="batch" class="form-control" placeholder="Batch Number" required="">
                                                    <input type="hidden" name="invo" value="<?php echo $_SESSION['invo'];?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Product Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="proname" class="form-control" placeholder="Product name" required="">
                                                </div>
                                            </div>
                                        </div>
                                        
                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Purchase MRP</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="mrp" class="form-control" placeholder="Purchase MRP" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Discount in %</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="dis" class="form-control" placeholder="Discount %" >
                                                </div>
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">GST</label>
                                                <div class="col-sm-9">
                                                  
                                                    <select name="gst" class="form-control" required onchange="mypurdetail(this.value)">
                                                      <option value="0">0%</option>
                                                      <option value="5">5%</option>
                                                      <option value="12">12%</option>
                                                      <option value="18">18%</option>
                                                      <option value="28">28%</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="purdetls"></div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">IGST</label>
                                                <div class="col-sm-9">
                                                    <select name="igst" class="form-control">
                                                      <option value="0">0%</option>
                                                      <option value="10">10%</option>
                                                      <option value="20">20%</option>
                                                      <option value="30">30%</option>
                                                      <option value="40">40%</option>

                                                      
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                         
                                        <button type="submit" name="btn_save" class="btn btn-primary mx-2 my-2 py-2 px-3 float-right">SUBMIT</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                
<!-- ./wrapper -->

<!-- jQuery -->
            <script>
                function mypurdetail(str)
                {
                if(str=="")
                {
                document.getElementById("purdetls").innerHTML = "";
                return;
                }
                else
                {
                if (window.XMLHttpRequest)
                {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
                }
                xmlhttp.onreadystatechange = function()
                {
                if (this.readyState == 4 && this.status == 200)
                {
                document.getElementById("purdetls").innerHTML=this.responseText;
                
                }
                };
                
                xmlhttp.open("GET","purdetail.php?q="+str,true);
                xmlhttp.send();
                }
                
                }
                </script>

<?php include 'scripts.php'; ?>
</body>
</html>

<?php 
if (isset($_POST['btn_save'])) 
{
  
$invo=$_POST['invo'];
$batchno=$_POST['batch'];
$proname=$_POST['proname'];
$mrp=$_POST['mrp'];
$gst=$_POST['gst'];
$dis=$_POST['dis'];
$cgst=$_POST['cgst'];
$sgst=$_POST['sgst'];
$igst=$_POST['igst'];
if (empty($igst)) {
  # code...

// if (empty($cgst) OR empty($sgst)) {
//     //not logged in/not admin
//     //redirect to homepage
//   $_SESSION['error']='cgst or sgst is not selected Successfully please try again';
//     header("Location:purchase.php");
//     die();
// }
}
$totalgst=$gst+$igst;

$excludii= ($mrp / (1+($totalgst/100)));
$excludee=($mrp * ($dis/100));

$exclude=$excludii-$excludee;


 $query="insert into pur2(invoices,batchno,proname,mrp,discount,gst,cgst,sgst,igst,exclude) 
    value('" .$invo ."','" .$batchno."','" .$proname."','".$mrp."','".$dis."','".$gst."','".$cgst."','".$sgst."','".$igst."','".$exclude."')";
  
    if(mysqli_query($conn,$query))
    {
        $_SESSION['quan']--;
        ?>
<script type="text/javascript">
window.location="addrec.php";
</script>

        <?php

    }


}


}
else
{
  
   $_SESSION['quan'] = null;
   $_SESSION['invo'] = null;
   ?>
   <script type="text/javascript">
window.location="view_purchase.php";
</script>
<?php
}
?>