
<?php
session_start(); 
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
 include 'head.php';
include'../connect.php';

$id=$_GET['smd'];
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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
             
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
               <?php 
$query="select * from posts where id='".$id."'";
$result=mysqli_query($conn,$query);
if($row=mysqli_fetch_array($result))
{ ?>



              <form class=" needs-validation" method="post" action="edit_post2.php" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="hidden" class="form-control"  name="post_id" value="<?php echo $id ;?>">
                  <label for="post_title" class="col-form-label">Title:</label>
                  <input type="text" class="form-control"  name="post_title" placeholder="Enter Title Here" required="" value="<?php echo $row['post_title'];  ?>">
                </div>
                <script>
//function myFunction() {
  //alert("Hello! I am an alert box!");
//}
</script>
                <div class="row">
                    <div class="col-sm-4">
                      <label for="category_id" class="col-form-label">Category:</label>
                      <select class="form-control" name="post_category" >
                        <?php 
                            $sql_select_category = "SELECT * FROM categories ORDER BY id DESC";
                            $result_sql_select_category = mysqli_query($conn, $sql_select_category);
                            while ($rowcategory = mysqli_fetch_assoc($result_sql_select_category))
                            {
                              $view_category_id = $rowcategory['id'];
                              $view_cat_title = $rowcategory['cat_title'];
                              $view_cat_desc = $rowcategory['cat_desc'];
                        ?>
                        <option value="<?php echo $view_category_id; ?>"><?php echo $view_cat_title; ?></option>
                        <?php
                            } 
                         ?>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <!-- <label for="post_autor" class="col-form-label ml-5">Author:</label>
                      <p class="ml-5"><b><?php //echo $_SESSION['name']; ?></b>  &nbsp; &nbsp;<img src="images/users/<?php //echo $_SESSION['image'] ?>" class="zoom3" alt="User Image" width="50"></p> -->

                      <input type="hidden" class="form-control" name="post_autor_edit" value="<?php echo $row['post_autor']; ?>">
                    </div>
                    <div class="col-sm-4">
                      <!-- <label for="post_date" class="col-form-label">Date:</label> -->
                      <input type="hidden" class="form-control"  name="post_date_edit" value="<?php echo $row['post_date']; ?>" required>
                    </div>
                  </div>
                     
                    <br><br>
                
                 <div class="row">
                 <div class="col-md-3">
                  <div class="form-group">
                      <label for="post_imagel" class="col-form-label">Image:</label>
                      <input type="file" name="new_post_image" id="new_post_image" accept="image/*" class="form-control">
                  </div>
                </div>
                   <div class="col-md-3">
                  <div class="form-group">
                      <label for="new_post_imagel" class="col-form-label">Image:</label>
                      <input type="file" name="new_post_image1" id="new_post_image1" accept="image/*" class="form-control">
                  </div>
                </div>
                   <div class="col-md-3">
                  <div class="form-group">
                      <label for="new_post_image2" class="col-form-label">Image:</label>
                      <input type="file" name="new_post_image2" id="new_post_image2" accept="image/*" class="form-control">
                  </div>
                </div>
                   <div class="col-md-3">
                  <div class="form-group">
                      <label for="new_post_image3" class="col-form-label">Image:</label>
                      <input type="file" name="new_post_image3" id="new_post_image3" accept="image/*" class="form-control">
                  </div>
                </div>
              </div>
             







                  <div class="form-group shadow-textarea">
                    <label for="post_text_edit" class="col-form-label">Text:</label>
                    <textarea name="post_text_edit" class="textarea" placeholder="Enter Post Text Here"style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row['post_text'];?></textarea>
                  </div>
                    
                  <div class="form-group">
                    <label for="post_tag" class="col-form-label">Tags:</label>
                    <input type="text" class="form-control"  name="post_tag_edit" value="<?php echo $row['post_tag']; ?>">
                  </div>
                  <div class="row">
                 
                  <div class="col-sm-6">
                    <label for="post_status" class="col-form-label" >Status:</label><br>
                    <input type="radio" name="post_status_edit"  value="1" checked=""> Publish
                    
                  </div>
                  <div class="col-sm-5 ">
                    <label for="post_priority_edit" class="col-form-label">Priority:</label>
                    <input type="text" class="form-control"  name="post_priority_edit" value="1">
                  </div>
                   <div class="col-sm-4">
                     
                    <input type="hidden" class="form-control"  name="post_visit_counter_edit" value="<?php echo $row['post_visit_counter']; ?>">
                  </div>
                </div>
                
                          <br><br>
             
                <button type="submit" class="btn btn-primary float-right px-4 py-2 mr-4" name="edit_post">SUBMIT</button>
        
              
            
           </div>
             </form>
            <?php } ?>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>


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
    // Summernote
    $('.textarea').summernote()
  })
</script>
   <script type="text/javascript">
                // Disable form submissions if there are invalid fields
                (function() {
                'use strict';
                window.addEventListener('load', function() {
                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
                }, false);
                });
                }, false);
                })();
                </script>

</body>
</html>
