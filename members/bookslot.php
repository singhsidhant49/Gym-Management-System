<?php
session_start();
include'../connect.php';
$page='bk';

if ($_SESSION['type']!=2) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
?>

<?php
include 'mhead.php';
?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include 'mtopnav_bar.php';?>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <?php include 'mside_bar.php'; ?>
    <!-- Main Sidebar Container End -->
    <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
          <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">BOOK SLOT</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Book Slot</li>
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
                               
                                  <?php
                                     $qu="select slot from timeboook where cid= '".$_SESSION['id']."'";
                                       $res=mysqli_query($conn,$qu);
                                        if($row=mysqli_fetch_array($res))
                                          { 
                                          ?>


                                      <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">CURRENT</label>
                                <div class="col-sm-9">
                                  <input type="text" value="<?php echo $row['slot'] ;?>" readonly class="form-control">
                                  
                                </div>
                              </div>
                            </div>

                                        
                                

                                        <?php 
                                            }

                                            else
                                            {

               
                                          
                                             ?>

                                             <form method="post" action="save_slot.php">

                                      <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Select Slot</label>
                                <div class="col-sm-9">
                                  <select name="plann" class="form-control">
                                    <option value="">--Select slot--</option>
                                    <?php
                                    $query="select * from timeslot ";
                                    $result=mysqli_query($conn,$query);
                                    while($row=mysqli_fetch_array($result)){
                                    ?>

                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['timeslot'] ?></option>
                                    <?php
                                    }

                                    ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                                        <button type="submit" class="btn btn-primary float-right" name="adtxt">SUBMIT</button>



                              </form>          
                              <?php }?>  
                          
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- ./wrapper -->
            <!-- jQuery -->
            <?php include'mscripts.php'; ?>  
            </body>
</html>  
       
            <link rel="stylesheet" href="../admin/popup_style.css">


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

<?php if(!empty($_SESSION['plansuccess'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['plansuccess']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["plansuccess"]);  
} ?>






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

        
    
        
