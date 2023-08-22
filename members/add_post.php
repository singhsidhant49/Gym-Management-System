<?php
session_start();
if ($_SESSION['type']!=2) {
    //not logged in/not admin
    //redirect to homepage
    header("Location: ../index.php");
    die();
}
include 'mhead.php';
include'../connect.php'; 
$page='pst';
session_start();
      $current_date = date('d/m/Y');
      if (isset($_POST['save_post']))
      {
         $ima=$_FILES['post_image'];
         $imb=$_FILES['post_image1'];
         $imc=$_FILES['post_image2'];
         $imd=$_FILES['post_image3'];
        
        $add_post_category=$_POST['category_id']; //category_id    -select name
        $add_post_title=$_POST['post_title'];
        $add_post_title = mysqli_real_escape_string($conn,$add_post_title);
        $add_post_autor=$_POST['post_autor'];
        $add_post_autor_name=$_POST['post_autor_name'];
        $add_post_autor_type=$_POST['post_autor_type'];
        $add_post_date=$_POST['post_date'];
        $add_post_edit_date=$current_date;
        //$add_post_image=$_POST['post_image'];
         $filename= $ima['name'];
 $fileerror=$ima['error'];
 $filetmp=$ima['tmp_name'];
 $destinationfile='../admin/images/blog/'.$filename;


function correctImageOrientation($filename) {
  if (function_exists('exif_read_data')) {
    $exif = exif_read_data($filename);
    if($exif && isset($exif['Orientation'])) {
      $orientation = $exif['Orientation'];
      if($orientation != 1){
        $img = imagecreatefromjpeg($filename);
        $deg = 0;
        switch ($orientation) {
          case 3:
            $deg = 180;
            break;
          case 6:
            $deg = 270;
            break;
          case 8:
            $deg = 90;
            break;
        }
        if ($deg) {
          $img = imagerotate($img, $deg, 0);        
        }
        // then rewrite the rotated image back to the disk as $filename 
        imagejpeg($img, $filename, 95);
      } // if there is some rotation necessary
    } // if have the exif orientation info
  } // if function exists      
}




move_uploaded_file($filetmp, $destinationfile);
correctImageOrientation($destinationfile);
 if(empty($filename))
 {
  $filename="";
 }


$filename1= $imb['name'];
$fileerror=$imb['error'];
$filetmp1=$imb['tmp_name'];
$destinationfile1='../admin/images/blog/'.$filename1;


// function correctImageOrientatio($filename1) {
//   if (function_exists('exif_read_data')) {
//     $exif = exif_read_data($filename1);
//     if($exif && isset($exif['Orientation'])) {
//       $orientation = $exif['Orientation'];
//       if($orientation != 1){
//         $img = imagecreatefromjpeg($filename1);
//         $deg = 0;
//         switch ($orientation) {
//           case 3:
//             $deg = 180;
//             break;
//           case 6:
//             $deg = 270;
//             break;
//           case 8:
//             $deg = 90;
//             break;
//         }
//         if ($deg) {
//           $img = imagerotate($img, $deg, 0);        
//         }
//         // then rewrite the rotated image back to the disk as $filename1 
//         imagejpeg($img, $filename1, 95);
//       } // if there is some rotation necessary
//     } // if have the exif orientation info
//   } // if function exists      
//}




move_uploaded_file($filetmp1, $destinationfile1);
correctImageOrientation($destinationfile1);
 if(empty($filename1))
 {
  $filename1="";
 }







  $filename2= $imc['name'];
 $fileerror=$imc['error'];
 $filetmp2=$imc['tmp_name'];
 $destinationfile2='../admin/images/blog/'.$filename2;


// function correctImageOrientati($filename2) {
//   if (function_exists('exif_read_data')) {
//     $exif = exif_read_data($filename2);
//     if($exif && isset($exif['Orientation'])) {
//       $orientation = $exif['Orientation'];
//       if($orientation != 1){
//         $img = imagecreatefromjpeg($filename2);
//         $deg = 0;
//         switch ($orientation) {
//           case 3:
//             $deg = 180;
//             break;
//           case 6:
//             $deg = 270;
//             break;
//           case 8:
//             $deg = 90;
//             break;
//         }
//         if ($deg) {
//           $img = imagerotate($img, $deg, 0);        
//         }
//         // then rewrite the rotated image back to the disk as $filename2 
//         imagejpeg($img, $filename2, 95);
//       } // if there is some rotation necessary
//     } // if have the exif orientation info
//   } // if function exists      
// }




move_uploaded_file($filetmp2, $destinationfile2);
correctImageOrientation($destinationfile2);
 if(empty($filename2))
 {
  $filename2="";
 }

$filename3= $imd['name'];
 $fileerror=$imd['error'];
 $filetmp3=$imd['tmp_name'];
 $destinationfile3='../admin/images/blog/'.$filename3;


// function correctImageOrientat($filename3) {
//   if (function_exists('exif_read_data')) {
//     $exif = exif_read_data($filename3);
//     if($exif && isset($exif['Orientation'])) {
//       $orientation = $exif['Orientation'];
//       if($orientation != 1){
//         $img = imagecreatefromjpeg($filename3);
//         $deg = 0;
//         switch ($orientation) {
//           case 3:
//             $deg = 180;
//             break;
//           case 6:
//             $deg = 270;
//             break;
//           case 8:
//             $deg = 90;
//             break;
//         }
//         if ($deg) {
//           $img = imagerotate($img, $deg, 0);        
//         }
//         // then rewrite the rotated image back to the disk as $filename3 
//         imagejpeg($img, $filename3, 95);
//       } // if there is some rotation necessary
//     } // if have the exif orientation info
//   } // if function exists      
// }




move_uploaded_file($filetmp3, $destinationfile3);
correctImageOrientation($destinationfile3);
 if(empty($filename3))
 {
  $filename3="";
 }


        $add_post_text=$_POST['post_text'];
        $add_post_tag=$_POST['post_tag'];
        $add_post_visit_counter=$_POST['post_visit_counter'];
        $add_post_status=$_POST['post_status'];
        $add_post_priority=$_POST['post_priority'];
        

        $sql_add_post = "INSERT INTO posts(post_category,post_title,post_autor,post_date,post_edit_date,post_image,post_image1,
        post_image2,post_image3,post_text,post_tag,post_visit_counter,post_status,post_priority,post_autor_name,autor_type) VALUES('$add_post_category', '$add_post_title', '$add_post_autor', '$current_date', '$current_date', 
        '$filename','$filename1','$filename2','$filename3', '$add_post_text' , '$add_post_tag','$add_post_visit_counter','$add_post_status',
         '$add_post_priority',' $add_post_autor_name',' $add_post_autor_type')";
        $result_sql_add_post= mysqli_query($conn, $sql_add_post);
        if (!$sql_add_post)
                {
                  die("Error description:" . mysqli_error());
                }
                else
                {
                  header("Location: post_member.php");
                  $_SESSION['post_ad']='Post Added successfully';
                }
      }
     ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'mtopnav_bar.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'mside_bar.php'; ?>
   <!--  side bar end -->

  <!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Add New Post</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add New Post</li>
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
              <form class=" needs-validation" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="post_title" class="col-form-label">Title:</label>
                  <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Enter Title Here" required="">
                </div>
                <script>
//function myFunction() {
  //alert("Hello! I am an alert box!");
//}
</script>
                <div class="row">
                    <div class="col-sm-4">
                      <!--<label for="category_id" class="col-form-label">Category:</label>-->
                      <select class="form-control" name="category_id" id="category_id" style="display:none;">
                          <option value="GYM">GYM</option>
                        // <?php 
                        //     $sql_select_category = "SELECT * FROM categories ORDER BY id DESC";
                        //     $result_sql_select_category = mysqli_query($conn, $sql_select_category);
                        //     while ($rowcategory = mysqli_fetch_assoc($result_sql_select_category))
                        //     {
                        //       $view_category_id = $rowcategory['id'];
                        //       $view_cat_title = $rowcategory['cat_title'];
                        //       $view_cat_desc = $rowcategory['cat_desc'];
                        // ?>
                        <!--<option value="<?php //echo $view_category_id; ?>"><?php //echo $view_cat_title; ?></option>-->
                        <?php
                        // } 
                        ?>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <!--<label for="post_autor" class="col-form-label ml-5">Author:</label>-->
                      <!--<p class="ml-5"><b><?php //echo $_SESSION['name']; ?></b>  &nbsp; &nbsp;<img src="../admin/images/users/<?php //echo $_SESSION['image']; ?>" class="zoom3" alt="User Image" width="50"></p>-->

                      <input type="hidden" class="form-control" id="post_autor" name="post_autor" value="<?php echo $_SESSION['username']; ?>">
                       <input type="hidden" class="form-control" id="post_autor_name" name="post_autor_name" value="<?php echo $_SESSION['name']; ?>">
                        <input type="hidden" class="form-control" id="post_autor_type" name="post_autor_type" value="<?php echo $_SESSION['type']; ?>">

                    </div>
                    <div class="col-sm-4">
                      <!--<label for="post_date" class="col-form-label">Date:</label>-->
                      <input type="hidden" class="form-control" id="post_date" name="post_date" value="<?php echo $current_date; ?>" required>
                    </div>
                  </div>
                  <div class="row">
                 <div class="col-md-3">
                  <div class="form-group">
                      <label for="post_imagel" class="col-form-label">Image:</label>
                      <input type="file" name="post_image" id="post_image" accept="image/*" class="form-control">
                  </div>
                </div>
                   <div class="col-md-3">
                  <div class="form-group">
                      <label for="post_imagel" class="col-form-label">Image:</label>
                      <input type="file" name="post_image1" id="post_image" accept="image/*" class="form-control">
                  </div>
                </div>
                   <div class="col-md-3">
                  <div class="form-group">
                      <label for="post_imagel" class="col-form-label">Image:</label>
                      <input type="file" name="post_image2" id="post_image" accept="image/*" class="form-control">
                  </div>
                </div>
                   <div class="col-md-3">
                  <div class="form-group">
                      <label for="post_imagel" class="col-form-label">Image:</label>
                      <input type="file" name="post_image3" id="post_image" accept="image/*" class="form-control">
                  </div>
                </div>
              </div>
              







                  <div class="form-group shadow-textarea">
                    <label for="post_text" class="col-form-label">Text:</label>
                    <textarea name="post_text"  class="textarea" placeholder="Enter Post Text Here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </div>
                    
                  <div class="form-group">
                    <!--<label for="post_tag" class="col-form-label">Tags:</label>-->
                    <input type="hidden" class="form-control" id="post_tag" name="post_tag">
                  </div>
                  <div class="row">
                 
                  <div class="col-sm-6">
                    <!--<label for="post_status" class="col-form-label" >Status:</label><br>-->
                    <input type="hidden" name="post_status" id="post_status" value="1" checked=""> 
                    <!--Publish-->
                    <input type="hidden" name="post_status" id="post_status" value="0" class="ml-3"> 
                    <!--Draft-->
                  </div>
                  <div class="col-sm-5 ">
                    <!--<label for="post_priority" class="col-form-label">Priority:</label>-->
                    <input type="hidden" class="form-control" id="post_priority" name="post_priority" value="1">
                  </div>
                   <div class="col-sm-4">
                    
                    <input type="hidden" class="form-control" id="post_visit_counter" name="post_visit_counter" value="0">
                  </div>
                </div>
                
                          <br><br>
             
                <button type="submit" class="btn btn-primary float-right px-4 py-2 mr-4" name="save_post">SUBMIT</button>
        
              </form>
           </div>
             
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
<?php include 'mscripts.php';?>
<!-- page script -->

 <script>
  $(function () {
    // Summernote
    $('.textarea').summernote();

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
