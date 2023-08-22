<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}

$page='adplan';
 include 'head.php';

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
            <h1 class="m-0 text-dark">Add Plan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Plan</li>
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
                                    <form class="form-horizontal" action="save_plan.php" method="POST" name="pform">

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Plan Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="pname" placeholder="Plan Name"  class="form-control"  required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Plan Detail</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" rows="4" name="pdetail" placeholder="Plan Detail" style="height: 120px;" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                          <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Select Format</label>
                                <div class="col-sm-9">
                                  <select name="plann" class="form-control" required onchange="myplandetail(this.value)">
                                    <option value="">--Select Plan--</option>
                                     <option value="months">Months</option>
                                      <option value="days">Days</option>

                                  </select>
                                </div>
                              </div>
                            </div>

                                        <div id="plandetls">
             
                           </div>
                           
                                           <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Rate :</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="prate" class="form-control" placeholder="Rate" required="">
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
                
        <script>
          function myplandetail(str)
          {
            if(str=="")
            {
              document.getElementById("plandetls").innerHTML="";
              return;
            }
            else
            {
              if(window.XMLHttpRequest)
              {
                xmlhttp = new XMLHttpRequest();
              }
              xmlhttp.onreadystatechange=function()
              {
                if(this.readyState==4 && this.status==200)
                {
                  document.getElementById('plandetls').innerHTML=this.responseText;
                }
              };
              xmlhttp.open("GET","chformat.php?q="+str,true);
              xmlhttp.send();
            }

          }

        </script>

<!-- jQuery -->
<?php include 'scripts.php'; ?>
</body>
</html>
<!-- =======================popup alert======================================= -->
<link rel="stylesheet" href="popup_style.css">
<!-- ====================sucess used in view_plan.php============================ -->

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
<?php if(!empty($_SESSION['planerror'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['planerror']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["planerror"]);  } ?>
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

