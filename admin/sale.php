<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
?>

<?php include 'head.php';
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
            <h1 class="m-0 text-dark">SALES</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sales</li>
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
                                    <form class="form-horizontal" action="save_sale.php" method="POST" name="enqform">
                                        <div class="form-group">
                                            <div class="row">
                                              <label class="col-sm-3 control-label">Date Of Sale</label>
                                                <div class="col-sm-9">
                                                  <input type="text" value="<?php echo date('d/m/Y')?>" name="sale_date" class="form-control"  >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Invoice Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="invo" class="form-control" placeholder="Invoice Number" required="">
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Batch Number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="batch" placeholder="Batch No"  class="form-control" required onkeyup="mysaledetail(this.value)">
                                                </div>
                                            </div>
                                          </div>
                                    
                                     <div id="slad"></div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Customer Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="cus_name" placeholder="Customer Name"  class="form-control"  required>
                                                </div>
                                            </div>
                                        </div>

                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Phone Number</label>
                                                <div class="col-sm-9">
                                                    <input type="Number" name="num" class="form-control" placeholder="Phone Number" id="tbNumbers"  required="">
                                                </div>
                                            </div>
                                        </div>

                                           
                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Sales MRP</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="mrp" class="form-control" placeholder="Product mrp" required="">
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
                <script>
                function mysaledetail(str)
                {
                if(str=="")
                {
                document.getElementById("slad").innerHTML = "";
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
                document.getElementById("slad").innerHTML=this.responseText;
                
                }
                };
                
                xmlhttp.open("GET","saleddetail.php?q="+str,true);
                xmlhttp.send();
                }
                
                }
                </script>
                
<?php include 'scripts.php'; ?>
</body>
</html>
<!-- =======================popup alert======================================= -->
<link rel="stylesheet" href="popup_style.css">
<!-- ====================sucess used in view_enquiry.php============================ -->

<!-- <?php //if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php //echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php //unset($_SESSION["success"]);  
//} ?> -->
<!-- =============================================================================== -->
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>

