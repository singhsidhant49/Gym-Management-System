<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}

$page='cat';
include 'head.php';
include '../connect.php';
ob_start();

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
            <h1>Add Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Category<li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#InsertCategory"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add new category</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <form action="" method="post">
              <div class="table-responsive ">
               
              <table id="example1" class="table table-bordered table-striped ">

                <thead>
                <tr> 
              <th>Serial No</th>
              <th>Title</th>
              <th>Description</th>
              <th>Slug</th>
              <th>Posts</th>
              <th>Status</th>
              <th>Delete</th>
                      
                </tr>
                </thead>
                <tbody>
                 
                     <?php 
                $counter= 0;
                $no=1;
                $sql_select_category = "SELECT * FROM categories ORDER BY id desc";
                $result_sql_select_category = mysqli_query($conn, $sql_select_category);
                while ($rowcategory = mysqli_fetch_assoc($result_sql_select_category))
                {
                  $view_category_id = $rowcategory['id'];
                  $view_cat_title = $rowcategory['cat_title'];
                  $view_cat_desc = $rowcategory['cat_desc'];
                  $view_cat_slug = $rowcategory['cat_slug'];
                  $view_cat_status = $rowcategory['cat_status'];
                  $view_cat_priority = $rowcategory['cat_priority'];
                  $view_cat_date = $rowcategory['cat_date'];
                  $counter++;
                  
             ?>
                    <tr>
                      <td><?php echo $no ?></td>
              <td><?php echo $view_cat_title ?></td>
              <td><?php echo $view_cat_desc ?></td>
              <td><?php echo $view_cat_slug ?></td>
                    <?php 
                $posts_category_counter= 0;
                $sql_select_category_posts = "SELECT * FROM posts WHERE post_category={$view_category_id}";
                $result_sql_selectcategory_posts = mysqli_query($conn, $sql_select_category_posts);
                while ($rowcategorypost = mysqli_fetch_assoc($result_sql_selectcategory_posts))
                {
                  $posts_category_counter++;
                } 
             ?>
              <td ><?php echo $posts_category_counter; ?></td>
              <?php 
                if ($view_cat_status==1)
                {
               ?>
              <td ><span class="label label-success">Published</span></td>
              <?php 
                }
                else
                {
              ?>
              <td ><span class="label label-warning">Draft</span></td>
              <?php
                }
              ?>
              <td>

                <button type="button" id="<?php echo $view_category_id ; ?>" class="btn btn-danger dt "><i class=" fa fa-trash"  aria-hidden="true"></i></button> 

            
              </td>
            </tr> 

                    </tr>
                    <?php


                    $no++;
                  
                     } ?>
                </tbody>
                <tfoot>

                <tr> 
                    <th>Serial No</th>
                  <th>Title</th>
              <th>Description</th>
              <th>Slug</th>
              <th>Posts</th>
              <th>Status</th>
              <th>Delete</th>
             
                      
                </tr>
                </tfoot>
              </table>
            
            </div>
            </form>
            </div>
            <!-- /.card-body -->
          </div>
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": false,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
    $(document).ready(function() {
      $('.dt').click(function() {
        var id = $(this).attr("id");
          $("#category_id_delete").val(id);
          $('#DeleteCategory').modal('show');
      });  




    });
    </script>
<?php include "layout/modal/add_new_category.php" ?>
     <!-- // Modal add new category -->
    <!-- Modal Delete Category-->
      <?php include "layout/modal/delete_category.php" ?>
    <!-- // Modal Delete Category-->
    <!-- Modal EDIT  category -->
    
<!-- Modal add new post -->
    
    
  </div>
  <!-- /.content-wrapper -->
 

 
<!-- ./wrapper -->

</body>
</html>
<link rel="stylesheet" href="popup_style.css">

<?php if(!empty($_SESSION['cus_success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
    Success
    </h1>
    <p><?php echo $_SESSION['cus_success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION['cus_success']);
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




