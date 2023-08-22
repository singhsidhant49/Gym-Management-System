<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}

$page='duepay';
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
   <!--  side bar end -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Slider Images</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Slider Images<li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card container">
             <form class="form-horizontal needs-validation" action="saveslider.php" method="POST" name="sliderform" enctype="multipart/form-data"novalidate>
                <div class="form-group">
                              <div class="row">
                                <label class="col-sm-3 control-label">Add Slider Images</label>
                                <div class="col-sm-9">

                                  <input type="file" name="image_name" class="form-control" />
                                </div>
                              </div>
                            </div>
                            <input class="btn btn-success" type="submit" value="Upload" name="submit">
             </form>    
          </div>
          <div class="container table-responsive" style="background-color:white;">
            <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>Images</th>
        <th>Action</th>
      </tr>
    </thead>
    <?php
            include_once("../connect.php");
          $select=mysqli_query($conn,"select * from slider ORDER BY id DESC"); 
            while($row=mysqli_fetch_array($select))
            {
              $id1=$row['id'];
              $img=$row['slider'];
                 $path="images/slider/".$img; 
            ?>
    <tbody>
      <tr>
        <td><img src="<?php echo $path ?>" height="200px"></td>
        <td><a href="delete_slider.php?id1=<?php echo $row['id'];?>"><img src='images/del.png' height='35px' width='42px' onclick="return confirm('Are you sure you want to delete this item?');"></a></td>
      </tr>
    </tbody><?php } ?>
  </table></div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include 'scripts.php';?>
<!-- page script -->
