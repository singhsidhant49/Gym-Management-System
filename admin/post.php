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
include'../connect.php';
ob_start();
 ?>
<?php
      
      if (isset($_GET['postid'])) 
      {
        $edit_post_id_visit=$_GET['postid'];

        $sql_select_post_visit = "SELECT * FROM posts WHERE id={$edit_post_id_visit}";
                $result_sql_select_post_visit = mysqli_query($conn, $sql_select_post_visit);
                while ($rowpost_visit = mysqli_fetch_assoc($result_sql_select_post_visit))
                {
                  
                  $view_post_visit_counter_all_visits = $rowpost_visit['post_visit_counter'];

                }


        $sql_edit_post_visit = "UPDATE posts SET post_visit_counter='$view_post_visit_counter_all_visits'+1 WHERE id={$edit_post_id_visit}";
        $result_sql_edit_post_visit= mysqli_query($conn, $sql_edit_post_visit);
        if (!$result_sql_edit_post_visit)
                {
                   die("Error description:" . mysqli_error());
                }
                else
                {
                  //echo "Data added successfully";
                  //header("Location: post_admin.php");
                }
      }
     ?>
<body class="hold-transition sidebar-mini">
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
     <div class="container">

    <div class="row">
      <?php 
      if (isset($_GET['postid'])) 
      {
        $selected_post_page= $_GET['postid'];

                $sql_select_post_page = "SELECT * FROM posts WHERE id={$selected_post_page}";
                $result_sql_select_post_page = mysqli_query($conn, $sql_select_post_page);
                while ($rowpostpage = mysqli_fetch_assoc($result_sql_select_post_page))
                {
                  $view_post_id = $rowpostpage['id'];
                  $view_post_category = $rowpostpage['post_category'];
                  $view_post_title = $rowpostpage['post_title'];
                  $view_post_autor = $rowpostpage['post_autor'];
                  $view_post_date = $rowpostpage['post_date'];
                  $view_post_edit_date = $rowpostpage['post_edit_date'];
                  $view_post_image = $rowpostpage['post_image'];
                  $view_post_image1 = $rowpostpage['post_image1'];
                  $view_post_image2 = $rowpostpage['post_image2'];
                  $view_post_image3 = $rowpostpage['post_image3'];
                  $view_post_text = $rowpostpage['post_text'];
                  $view_post_tag = $rowpostpage['post_tag'];
                  $view_post_visit_counter = $rowpostpage['post_visit_counter'];
                  $view_post_status = $rowpostpage['post_status'];
                  $view_post_priority = $rowpostpage['post_priority'];
                    $view_post_autor_name = $rowpostpage['post_autor_name'];
                }
      }
      else
      {
        header("Location: view_blog.php");
      }


       ?>
      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4 mb-4"><?php echo $view_post_title ?></h1>
        <div id="p11"></div>
        <!-- Author -->
        <?php 
              $sql_select_users_article = "SELECT * FROM users WHERE id={$view_post_autor}";
                $result_sql_select_users_article = mysqli_query($conn, $sql_select_users_article);
                if ($rowusers_article = mysqli_fetch_assoc($result_sql_select_users_article))
                {
                  $view_users_id = $rowusers_article['id'];
                  $view_users_name = $rowusers_article['name'];
                  $view_users_image = $rowusers_article['image'];
                } 
                else
                {
                  $sql_article = "SELECT * FROM members WHERE contact={$view_post_autor}";
                $result_article = mysqli_query($conn, $sql_article);
                if ($rowusers_article = mysqli_fetch_assoc($result_article))
                {
                
                  $view_users_name = $rowusers_article['cus_name'];
                  $view_users_image = $rowusers_article['m_image'];
                } 
                else
                {

                  $view_users_name=$view_post_autor_name;
                  $view_users_image="user1.png";
                }
              }
             ?>
        <p class="lead">
         <img src="images/users/<?php echo $view_users_image; ?>" class="zoom3 mr-2 img-circle" width="50" align="left" hspace="5">
            <h5>By <?php echo $view_users_name; ?></h5> 
                <h6>Posted on <?php echo $view_post_date; ?></h6> 
          
        </p>

       

        
         <hr> 
        <!-- Preview Image -->
       <?php
          
          if($view_post_image=="")
          {
            
          }
          else
          {
          echo "<img class='card-img-top img-thumbnail' src='../admin/images/blog/$view_post_image'><br>";  
          }
           if($view_post_image1=="")
          {
            
          }
          else
          {
          echo "<img class='card-img-top img-thumbnail' src='../admin/images/blog/$view_post_image1'><br>";  
          }
            if($view_post_image2=="")
          {
            
          }
          else
          {
          echo "<img class='card-img-top img-thumbnail' src='../admin/images/blog/$view_post_image2'><br>";  
          }
            if($view_post_image3=="")
          {
            
          }
          else
          {
          echo "<img class='card-img-top img-thumbnail' src='../admin/images/blog/$view_post_image3'>";  
          }
          ?>

<!--         <hr> -->
        <!-- Post Content -->
        <p class="lead"><?php echo $view_post_text; ?></p>
        <hr>

       <?php include "../comment_form.php" ?>

        <?php include "../comments.php" ?>

        

      </div>

      <!-- Sidebar Widgets Column -->
      <?php include "rightsidebar.php"; ?>

    </div>
    <!-- /.row -->

  </div>
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

</body>
</html>
<!-- =======================popup alert======================================= -->
