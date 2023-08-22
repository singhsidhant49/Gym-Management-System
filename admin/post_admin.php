<?php
session_start();
if ($_SESSION['type']!=1) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
?>

<?php 
$page='pst';
include 'head.php';
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
    <!--  side bar end-->
  <!-- ==================modal for comform delete============================= -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ARE YOU SURE??</h4>
          
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <form name="modalform" action="delete_post.php" method="post">
        <div class="modal-body">
          <input type="hidden"  id="modid" name="modid">
          DO YOU WANT TO DELETE THIS RECORD ??
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger text-white">Delete</button>
                             
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </form>
        
      </div>
    </div>
  </div>


                 
                             <!--  =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>POST</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Post<li>
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
                    <h3 class="card-title"><!-- <a href="new_member.php" class="btn btn-primary">Add new post</a> -->
                       
          
                  <button type="button" class="btn btn-primary "><a href="add_post.php" class="text-white">Add Post</a></button>



                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="table-responsive ">
                      <table id="example1" class="table table-bordered table-striped " cellspacing="0" cellpadding="0">
                        <thead>
                          <tr>
                             <th style="text-align: center;">Serial No</th>
                             <th style="text-align: center;">Title</th>
                             <th style="text-align: center;">Author</th>
                             <!--<th style="text-align: center;">Category</th> -->
                             
                             <!--<th style="text-align: center;"><i class="fa far fa-eye" aria-hidden="true"></i></th>-->
                             <!--<th style="text-align: center;">Status</th>-->
                      
                             <th style="text-align: center;">Edit/Delete</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $num=1;
                          $counter= 0;
                $sql_select_post = "SELECT * FROM posts ORDER BY id desc";
                $result_sql_select_post = mysqli_query($conn, $sql_select_post);
                while ($rowpost = mysqli_fetch_assoc($result_sql_select_post))
                {
                  $view_post_id = $rowpost['id'];
                  $view_post_category = $rowpost['post_category'];
                  $view_post_title = $rowpost['post_title'];
                  $view_post_autor = $rowpost['post_autor'];
                  $view_post_date = $rowpost['post_date'];
                  $view_post_edit_date = $rowpost['post_edit_date'];
                  $view_post_image = $rowpost['post_image'];
                  $view_post_text = $rowpost['post_text'];
                  $view_post_tag = $rowpost['post_tag'];
                  $view_post_visit_counter = $rowpost['post_visit_counter'];
                  $view_post_status = $rowpost['post_status'];
                  $view_post_priority = $rowpost['post_priority'];
                  $view_post_autor_name = $rowpost['post_autor_name'];
                  $view_post_autor_type = $rowpost['autor_type'];
                 
                  $counter++;
                  
             ?>
                          
                          <tr>
                               
                <td style="text-align: center;"><?php echo $num; ?></td>

           <td><a href="post.php?postid=<?php echo $view_post_id; ?>" target="_blank" style="color:black"><?php echo $view_post_title ?></a></td>
                           <?php 
                $sql_select_users = "SELECT * FROM users WHERE id={$view_post_autor}";
                $result_sql_select_users = mysqli_query($conn, $sql_select_users);
                if ($rowusers = mysqli_fetch_assoc($result_sql_select_users))
                {
                  $view_users_id = $rowusers['id'];
                  $view_users_name = $rowusers['name'];
                  $view_users_username = $rowusers['username'];
                  $view_users_email = $rowusers['email'];
                  $view_users_password = $rowusers['password'];
                  $view_users_gender = $rowusers['gender'];
                  $view_users_image = $rowusers['image'];
                  $view_users_code = $rowusers['code'];
                  $view_users_status = $rowusers['status'];
                  $view_users_type = $rowusers['type'];
              
                    #echo <td>"$view_users_name"</td>
                             }
                             ?>
              
                <td><?php echo "$view_post_autor_name";?></td>
              <?php 
            
         

                    $sql_select_category_by_id = "SELECT * FROM categories WHERE id ={$view_post_category}";
                    $result_sql_select_category_by_id = mysqli_query($conn, $sql_select_category_by_id);
                     if ($rowcategory_by_id = mysqli_fetch_assoc($result_sql_select_category_by_id))
                      {
                        $view_category_id_by_id = $rowcategory_by_id['id'];
                        $view_cat_title_by_id = $rowcategory_by_id['cat_title'];
                        //$view_cat_desc_by_id = $rowcategory_by_id['cat_desc'];
                      } 
                      else{
                        $view_cat_title_by_id="category deleted";
                      }
              ?>
                  <!--<td ><?php //echo $view_cat_title_by_id ?></td>-->
           
              <!--<td ><span class="label label-success"><?php //echo $view_post_visit_counter ?></span></td>-->
 <?php 
                if ($view_post_status==1)
                {
               ?>
              <!--<td ><span class="label label-success">Published</span></td>-->
              <?php 
                }
                else
                {
              ?>
              <!--<td ><span class="label label-warning">Draft</span></td>-->
              <?php
                }
              ?>
             
                <td >
          <table class="table-sm table-bordered bg-light"><tr>
      <td>  
          <button type="button" id="<?php echo $view_post_id; ?>" class="btn btn-danger bt mb-1"><i class=" fa fa-trash"  aria-hidden="true"></i></button></td>
                       
           <!-- <td><button type="button" class="btn btn-success mb-1"><i class=" fa fa-edit"  aria-hidden="true"></i></button></td>
 -->

            <td><a href="edit_post.php?smd=<?php echo $view_post_id;?>"class="text-white btn btn-primary mb-1"><i class=" fa fa-edit"  aria-hidden="true"></i></a></td>
                              </tr>
                             </table>
  
                            </td> 
                          </tr>
                         
                          <?php
                          $num++;
                          } ?>
                        </tbody>
                        <tfoot>
                        <th>Serial No</th>
                             <th>Title</th>
                             <th>Author</th>
                             
                            
                             <th>Edit/Delete</th>
                            
                        
                      </tr>
                      </tfoot>
                    </table>
                  </div>
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
    <!-- ============================== -->
       <script>
    $(document).ready(function()
     {
      $('.bt').click(function()
       {
        var id = $(this).attr("id");
          $("#modid").val(id);
          $('#myModal').modal('show');
      });  




    });
    </script>
    <!-- ============================== -->
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
  </body>
</html>
<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['post_ad'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['post_ad']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["post_ad"]);  
} ?>

<?php if(!empty($_SESSION['deletepost_success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['deletepost_success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["deletepost_success"]);  
} ?>
<!-- =============================error used in add_enquiry.php======================== -->

 <?php if(!empty($_SESSION['deletepost_error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['deletepost_error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["deletepost_error"]);  } ?> 
<!-- ===================================-->

<?php if(!empty($_SESSION['editpost_success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['editpost_success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["editpost_success"]);  
} ?>
<!-- =============================error used in add_enquiry.php======================== -->

 <?php if(!empty($_SESSION['editpost_error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['editpost_error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["editpost_error"]);  } ?> 
<!-- ===================================-->



 <script type="text/javascript">
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>
